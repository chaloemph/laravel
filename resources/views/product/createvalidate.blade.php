<style>
.flex-center {
    align-items: center;
    display: inline !important;
    justify-content: center;
}
</style>
@extends('layout.app')
@section('title' , 'create product')
@section('content')
<div class="row">
    <form class="col s12" method="post" action="/validate">
        @csrf
        <div class="row" style="text-align:left">
        <div class="input-field col s12">
        <i class="material-icons prefix">apps</i>
        <input placeholder="Placeholder" id="name" name="name" type="text" class="validate">
        <label for="name">Product Name</label>
        @if($errors->first('name'))
        <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{$errors->first('name')}}</span>
        @endif
        </div>
        </div>
        <button type="submit" class="waves-effect waves-light btn" style="float:right">submit</button>
    </form>
    </div>

    <ul>
        @foreach ($product as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
@endsection