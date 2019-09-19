<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Company;
use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;



use Illuminate\Http\Request;


class CustomerController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {


    //    $activeCustomers = Customer::all()->where('active' , 1);
       $activeCustomers = Customer::Active()->get();
       $inactiveCustomers = Customer::Inactive()->get();
       $companies = Company::all();

    //    dd($activeCustomers);
       return view('customer.index', compact('activeCustomers' , 'inactiveCustomers' , 'companies'));
    }


    public function store()
    {

      
       $customer = request()->validate([
         'name'=> 'required|min:3',
         'lastname'=> 'required|min:3',
         'email'=> 'required|email',
         'active'=> 'required',
         'company_id'=> 'required',
       ]);

       event(new NewCustomerHasRegisteredEvent($customer));

       Customer::create($customer);
       return back();

    }
}
