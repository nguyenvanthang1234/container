<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    //
function url(){

    //  $url=action("App\Http\Controllers\insertController@show");
    $url=url()->current();

     echo $url;
}
function string(){
    // lay do dai 1 chuoi
    $str_1="nguyen van a";
    // /viet hoa
    // echo Str::lower($str_1);

    // echo Str::upper($str_1);


    // echo Str::length($str_1);

    // loai bo ki tu
    // $str=Str::of('   ngu   ')->trim();

    // link than thien
    // $str=Str::slug("nguyen van thang");

    // lay chuoi content
    // $str="nguyen van thang";
    // $str=Str::of($str)->substr(0,4);


    // thay the chuoi
    // $str="nguyen van thang";
    // $str=Str::of($str)->replace("nguyen","lol");

    // cat chuoi
    $str="nguyen van thang";
    $str=Str::of($str)->limit(5);

    // kiem tra chuoi con
    $str="nguyen van thang";
    $str=Str::contains($str,"nguyen1");


    // noi chuoi
    // $str=Str::of("nguyen van ")->append("thang");





    echo $str;

}

   
}
