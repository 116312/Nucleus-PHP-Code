<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
 function __construct()
    {

    	
        $this->middleware('auth:admin');

    }

    public function dashboard(){
        $page = 'dashboard';
        
        return view('admin.dashboard',compact('page'));
    }
}
