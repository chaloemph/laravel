@extends('layout.app')
@section('page')
    product
@endsection
@section('content')
    <div class="container" style="text-align:left">
        <h1>Contact</h1>
        @if(!session()->has('status'))
        <div class="row">
            <form class="col s12" method="POST" action="{{route('contact.store')}}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                    <input id="first_name" name="name" type="text" class="validate" value="{{old('name')?? $user->name}}">
                        <label for="first_name">First Name</label>
                        @if($errors->first('name'))
                        <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                    <input id="email" name="email" type="text" class="validate" value="{{old('email')?? $user->email}}">
                        <label for="email">Email</label>
                        @if($errors->first('email'))
                        <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                    <textarea id="message" name="message" class="materialize-textarea" value="{{old('message')}}"></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
                <button style="float:right" class="btn" type="submit">submit</button>
            </form>
        </div>
        @endif
    </div>

    @if(session()->has('status'))
     <h3 class="animated bounceInLeft" style="color:#b0ee6e">SUCCESS SEND MAIL !</h3>
    @endif
    
    
        
@endsection