<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class productsController extends Controller
{
    //
    function show(){
  
            // duyet tat ca
            $product =Product::all();
        
             return view('product.show',compact("product"));

    }

}
