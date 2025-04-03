<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;

class FrontController extends Controller
{
    //
    public function index(){
        $products=Product::all();
        return view('home.index',compact('products'));
    }

}

