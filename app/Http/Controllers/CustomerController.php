<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Company;
use App\Mail\WelcomeNewUserMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
      

       $data = request()->validate([
         'name'=> 'required|min:3',
         'lastname'=> 'required|min:3',
         'email'=> 'required|email',
         'active'=> 'required',
         'company_id'=> 'required',
       ]);

     

       event(new NewCustomerHasRegisteredEvent());
       Mail::to($data['email'])->send(new WelcomeNewUserMail());


       \dump('Register to newsleter ');

       \dump('Slack message here');
           
       
      
      //  Customer::create($data);

      //  return back();

    }
}
