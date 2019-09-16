@extends('layout.app')
@section('page')
    product
@endsection
@section('content')
    <div class="rows">
        <div class="col s12" style="text-align:right">
            <a href="/product/create" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
    </div>
    <table class="bordered">
        <thead>
          <tr>
              <th style="width:100px">#</th>
              <th>Product Name</th>
              <th style="width:250px">Create time</th>
              <th style="width:250px">Update time</th>
              <th style="width:350px"></th>
          </tr>
        </thead>

        <tbody>
        @forelse($products as $product)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
            <td>
            <a href="/product/{{$product->id}}" class="waves-effect waves-light btn  green darken-4"><i class="material-icons right">search</i>view</a>
                <a href="/product/{{$product->id}}/edit" class="waves-effect waves-light btn"><i class="material-icons right">edit</i>edit</a>
            <form action="/product/{{$product->id}}" method="POST" style="display:contents">
                @csrf
                @method('delete')
                <button type="submit" class="waves-effect waves-light btn  red darken-4"><i class="material-icons right">delete</i>delete</button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        
@endsection