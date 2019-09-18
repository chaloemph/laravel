@extends('layout.app')
@section('page')
    product
@endsection
@section('content')
    <div class="container" style="text-align:left">
        <div class="row">
        <form class="col s12" method="POST" action="{{route('customer.store')}}">
                @csrf
                <div class="row">
                    <div class="input-field col s6">
                    <input id="first_name" name="name" type="text" class="validate" value="{{old('name')}}">
                        <label for="first_name">First Name</label>
                        @if($errors->first('name'))
                        <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" name="lastname" type="text" class="validate">
                        <label for="last_name">Last Name</label>
                        @if($errors->first('lastname'))
                        <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{$errors->first('lastname')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                            <input id="email" name="email" type="text" class="validate">
                            <label for="email">Email</label>
                            @if($errors->first('email'))
                            <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    <div class="input-field col s6">
                        <select name="active">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="1">active</option>
                            <option value="0">inactive</option>
                        </select>
                        <label>Active Customer</label>
                        @if($errors->first('active'))
                            <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{$errors->first('active')}}</span>
                            @endif
                     </div>
                     <div class="input-field col s6">
                            <select name="company_id">
                                @foreach ($companies as $company)
                                   <option value=" {{$company->id}}"> {{$company->name}}</option>
                                @endforeach
                            </select>
                            <label>Company</label>
                            @if($errors->first('company_id'))
                                <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{$errors->first('company_id')}}</span>
                                @endif
                         </div>
                </div>
                <button style="float:right" class="btn" type="submit">submit</button>
            </form>
        </div>
        <div class="row">
            <div class="col s6">
                <h1>activeCustomers</h1>
                    <ul class="collection">
                        @foreach ($activeCustomers as $customer)
                        <li class="collection-item">{{$loop->iteration}} . {{$customer->name}} <label for="">{{$customer->company->name}}</label></li>
                        @endforeach
                    </ul>
            </div>
            <div class="col s6">
                <h1>inactiveCustomers</h1>
                <ul class="collection">
                    @foreach ($inactiveCustomers as $customer)
                    <li class="collection-item">{{$loop->iteration}} . {{$customer->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row">
                <div class="col s12">
                    @foreach ($companies as $company)
                        <h3>{{$company->name}}</h3>

                        <ul>
                            @foreach ($company->customers as $customer)
                                <li>{{$customer->name}}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
                
            </div>


    </div>
    
    
        
@endsection