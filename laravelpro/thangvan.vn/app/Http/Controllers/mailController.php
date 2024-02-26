<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    //
   
    function sendMail(){
        $data=[
            'key1'=>'du lieu duoc truyen tu controller'
        ];
        Mail::to("vanthang.thophu@gmail.com")->send(new DemoMail($data));
    }
}
