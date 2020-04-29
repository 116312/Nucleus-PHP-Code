<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiDetailController extends Controller
{
    public function registerForm(){

     $page = "register-form";
     return view('api.user-register-form',compact('page'));
       

    }



    public function loginForm(){

        return view('api.login');
    }



    public function socialLoginForm(){
       
        return view('api.social-login');
    }



    public function getcategoryForm(){
  

      $users =User::all(); 
       
       return view('api.get-all-category-form',compact('users'));

    }



    public function geteditForm(){

         $users = User::all();



         return view('api.get-edit-form',compact('users'));





    }


    public function getprofileForm(){
      
      $users = User::all();


      return view('api.get-profile-form',compact('users'));





    }


    public function getforgotpasswordForm(){

          return view('api.forgot-password');
    }


 public function getresetpasswordForm(){
   $users = User::all();

          return view('api.reset-password',compact('users'));
    }

   

}
