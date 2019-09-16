<style>
.flex-center {
    align-items: center;
    display: inline !important;
    justify-content: center;
}
</style>
@extends('layout.app')
@section('title')
    create product
@endsection
@section('content')
<div class="row">
    <form class="col s12" method="post" action="/product/store">
        @csrf
      <div class="row" style="text-align:left">
        <div class="input-field col s12">
        <i class="material-icons prefix">apps</i>
        <input placeholder="Placeholder" id="name" name="name" type="text" class="validate">
        <label for="name">Product Name</label>
        @if(Session::has('error'))
        <script>
        window.onload =()=>{
          var toastHTML = '<span class="">{{Session::get('error')['title']}}</span>';
          M.toast({html: toastHTML })
          }
          </script>
        <span class="helper-text" style="color:red" data-error="wrong" data-success="right">{{Session::get('error')['title']}}</span>
        @endif
        </div>
      </div>
      <button type="submit" class="waves-effect waves-light btn" style="float:right">submit</button>
    </form>
  </div>
@endsection