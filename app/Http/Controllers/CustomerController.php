<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Company;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
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
      
       Customer::create($data);

       return back();

    }
}
