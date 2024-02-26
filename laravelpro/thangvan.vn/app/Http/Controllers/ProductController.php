<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function add(){
        DB::table("products")->insert(
            ['name'=>"nuoc ngot","price"=>"7","user_id"=>"4","content"=>"san pham"]
        );
    }

    function show(){
        // $products=DB::table("products")->select("name","price")->get();
        // echo $products
        $products=DB::table("products")->where("user_id",1)->first();
         return $products;
    }

    function update($id){
        DB::table("products")
        ->where("id",$id)
        ->update(
            ["name"=>"banh mi"]
        );
    }
    function delete($id){
        DB::table("products")
        ->where("id",$id)
        ->delete();
        
    }




}
