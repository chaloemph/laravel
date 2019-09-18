<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
      if (Auth::check()) {
        $user = auth()->user();
      }else{
        $user['name'] ="";
        $user['email'] ="";
      }
      
      return view('contact.create' , compact('user'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'message'=> 'required',
          ]);
         
        $mail = Mail::to($data['email'], $data['email'])->send(new ContactFormMail($data));
        $status =  ['success'];
        return redirect()->back()->with('status', 'success');
    }
}
