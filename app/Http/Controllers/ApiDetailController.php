<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiDetailController extends Controller
{
    public function registerForm(){

     $page = "register-form";
     return view('api.user-register-form',compact('page'));
       

    }



    public function loginForm(){

        return view('api.login');
    }

}
