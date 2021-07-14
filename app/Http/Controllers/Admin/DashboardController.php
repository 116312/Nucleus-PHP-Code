<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\SubscriptionCategory;
use App\Model\SubscriptionPlan;
use App\Model\UserSubscribedVideosDetails;
use App\Model\UserSubscriptionPlanDetails;

class DashboardController extends Controller
{
    
 function __construct()
    {


    /*    $this->middleware('auth:admin');*/


    }

    public function dashboard(){
        $page = 'dashboard';
        $totalUsers=User::count();
        $totalSubscribedUsers=UserSubscriptionPlanDetails::where('status', '=',1)->count();
      
        return view('admin.dashboard',compact('page','totalUsers','totalSubscribedUsers'));
    }
}
