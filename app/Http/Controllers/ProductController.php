<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   


    public function create()
    {
        return view('product.create');
    }

    public function index()
    {
        $productList = Product::all();
        $product = $productList->toArray();
        return view('product.index')->with("products" , $productList);
    }


    public function show(Product $product)
    {
        // $product = Product::findOrFail($id);
        return view('product.show')->with("product" , $product);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit')->with('product' , $product);
    }

    public function update($id)
    {
        $product = Product::findOrFail($id);
        $product->name = \request()->name;
        $product->save();
        // return redirect('/product/'.$id);
        return redirect(route('product.show',$id));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete    ();
        return redirect('/product');
    }


    public function createvalidate()
    {   
        $product = Product::all();
        return view('product.createvalidate')->with('product' , $product);
    }

    public function validatecheck()
    {

       $data = request()->validate([
            'name' => 'required'
       ]);


       $name = request()->name;
       $product = new Product();
       $product->name = $name;
       $product->save();
       return redirect(route('createvalidate'));
    }

    public function store()
    {
       $name = request()->name;
       if(empty($name)){
            // request()->session()->put('error', 'missing');
            request()->session()->flash("error" , ["title"=>"missing"]);
            return redirect()->back();
       }else{
            request()->session()->forget('error', 'missing');
       }

       $product = new Product();
       $product->name = \request()->name;
       $product->save();
       return redirect('/product');
    }
    
}
