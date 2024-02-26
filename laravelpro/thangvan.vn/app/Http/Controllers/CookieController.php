<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    //
    function set(){
        $response=new Response();
        // thoi gian song 24 gio nhan 60 
       return $response->cookie("vanthang","an cut",24*60);;
    }

    function get(Request $request){
        return $request->cookie("vanthang");

    }
}
