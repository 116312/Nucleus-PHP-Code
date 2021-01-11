<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\SubscriptionCategory;
use App\Model\SubscriptionPlan;
use App\Model\UserSubscribedVideosDetails;
use Carbon\Carbon;
use Response;
use DB;
class UserController extends Controller
{

  function __construct()
    {


        $this->middleware('auth:admin');


    }


   public function allUsers(){
        $users = User::with(['usersubscriptiondetails.usersubscriptionplandetails','usersubscriptiondetails.usersubscriptionplandetails'])->orderBy('created_at','desc')->get();;
        $page = 'users';
     

        return view('admin.all-users',compact('page','users'));
    }


   public function delete($id){
     
     User::where('id',$id)->delete();

     return back()->with('status',100)->with('type','success')->with('message','User deleted Successfully');

   }
  public function getAllUserDetail(Request $request)
   {
       
       $page = 'subscribed premium videos';
       $userId=$request->id;
       $usersubscriptiondetailsId=$request->usersubscriptiondetailsId;
       $premium_videos = DB::select("select premium_videos.name,user_subscribed_videos_details.id,user_subscribed_videos_details.access FROM user_subscribed_videos_details INNER JOIN premium_videos ON user_subscribed_videos_details.premium_video_id = premium_videos.id where user_subscription_id='$usersubscriptiondetailsId'");
       return view('admin.subscribed-premium_videos',compact('page','premium_videos'));
       
   }
  public function changedPremiumVideoAccess(Request $request)
   {
       $videoid=$request->videoid;
       $status=$request->status;
       $updateData=array(
           "access"=>$status
           );
       UserSubscribedVideosDetails::where('id',$videoid)->update($updateData);
       return back()->with('status',100)->with('type','success')->with('message','Status Has been changed');
       
   }
   
}
