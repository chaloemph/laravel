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
            {{-- <form class="col s12" method="post" action="/product/{{$product->id}}"> --}}
            <form class="col s12" method="post" action="{{ route('product.update' , ['id'=> $product] ) }}">
                @csrf
                @method('put')
              <div class="row">
                <div class="input-field col s12">
                <i class="material-icons prefix">apps</i>
                <input placeholder="Placeholder" id="name" name="name" type="text" class="validate" value="{{$product->name}}">
                <label for="name">Product Name</label>
                </div>
              </div>
              <button type="submit" class="waves-effect waves-light btn" style="float:right">submit</button>
            </form>
          </div>
        @endsection