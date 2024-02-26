<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    function add(Request $request){
        // $request->session()->put("username","thangvan");

        session(["username"=>"vanthang"]);



    }
    function show(Request $request){
        // return $request->session()->all();


        // kiem tra se ton ati hay chua anh em minh oi toi nay di 

        // if($request->session()->has("username")){
        //     echo "da luu user vao session";
        // }


        // return $request->session()->get("username");


        // return $request->session()->get("status");

        return session('username');

    }

    function add_flash(Request $request){
        // $request->session()->flash("status","ban da them san pham thanh cong");

    }

    function delete(Request $request){
        // xoa 1 phan tu trong session
        // $request->session()->forget("username");

        // xoa tat ca
        $request->session()->flush();


    }
}
