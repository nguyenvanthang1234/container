<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class adminController extends Controller
{
function __construct()
{
    //  chi co rang buoc phan index con show thi ko mac du tro den admin
   $this->middleware("checkAge")->only("index");
}
    //
    function index(){
        return view("admin");
    }
    function show(){
        return view("admin");
    }

    function dashboard(){
        $users=Auth::user();
        return $users->role->name;
        // echo "ok";
    }
}
