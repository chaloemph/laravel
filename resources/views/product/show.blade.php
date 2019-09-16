@extends('layout.app')
@section('title')
    product {{$product->id}}
@endsection
@section('content')
    <div class="row">
        <div class="col s4 m4">
            <div class="card">
            <div class="card-image">
                <img src="https://picsum.photos/id/1080/6858/4574">
                <span class="card-title"> {{$product->name}}</span>
            </div>
            <div class="card-content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam dolorem illo nesciunt? Dolore eveniet sequi numquam voluptate, iusto, consequuntur aperiam, excepturi repellat praesentium rerum odit doloremque saepe culpa inventore! Doloremque?</p>
            </div>
            </div>
        </div>
    </div>
@endsection