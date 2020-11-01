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


   public function delete($id){
     
     User::where('id',$id)->delete();

     return back()->with('status',100)->with('type','success')->with('message','User deleted Successfully');

   }
}
