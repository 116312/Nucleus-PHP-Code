<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserSubscriptionDetails;
use App\User;
use DB;
class UserSubscriptionController extends Controller
{
    /**
     * this function use for get all subscribed users
     * @return
     */
    public function getAllSubscribedUsers(Request $request)
    {
       $page = 'Subscribed Users';
       $users=UserSubscriptionDetails::getAllSubscribedUsers();
      /* echo "<pre>";
      print_r($users);
      die;*/
        return view('admin.subscribedusers.show',compact('page','users'));
     
    }
    public function assignSubscription()
    {
        
    }
}
