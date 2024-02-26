<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminPostController extends Controller
{
    function show(){
        return view("admin/post/show");
    }
}
