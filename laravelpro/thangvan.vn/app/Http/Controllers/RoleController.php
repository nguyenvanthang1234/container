<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
        function show(){
            $user=Role::find(3)
            ->users;
            return $user;


        //     $roles=user::find(4)
        //     ->roles;

        //   echo $roles;

    
        }
}
