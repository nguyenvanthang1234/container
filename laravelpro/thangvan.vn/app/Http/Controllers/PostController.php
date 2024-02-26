<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostController extends Controller
{
function show($id){
    $color=array('red','hong');
//  compact truyen du lieu tu view sang controller
    return view('product.show',compact("id","color"));
}

function detail(){
    echo " day la chi tiet trang";
}
}
