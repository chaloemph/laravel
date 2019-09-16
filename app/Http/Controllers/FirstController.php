<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index()
    {
        $arr = [1,2,3,4,5];
        return view('welcome')->with('data' , $arr);
    }

    public function show($id=null)
    {
        return view('welcome')->with('data' , $id);
    }

    public function script()
    {
        $script = "<script>alert(555)</script>";
        return view('welcome')->with('data' , $script);
    }

    public function loop()
    {
        $arr = [1,2,3,4,5];
        return view('welcome')->with('arr' , $arr);
    }
}
