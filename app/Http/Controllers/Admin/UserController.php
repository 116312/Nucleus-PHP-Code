<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use Carbon\Carbon;
use Response;
class UserController extends Controller
{

  function __construct()
    {


        $this->middleware('auth:admin');


    }


   public function allUsers(){
        $users = User::orderBy('created_at','desc')->get();
        $page = 'users';

        return view('admin.all-users',compact('page','users'));
    }
}
