<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function($request,$next){
            session(["module_active"=>"dashboard"]);
            return $next($request);
        });
    }

    function show(){
        return view("admin.dashboard");
    }
}
