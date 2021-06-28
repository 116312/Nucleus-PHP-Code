<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PremiumVideos;
use Response;
use App\Model\UserSubscriptionDetails;
use App\Model\UserSubscribedVideosDetails;
use App\Model\UserSubscriptionPlanDetails;
use App\Model\SubscriptionVideo;
use App\Model\PremiumWorkoutDetails;
use App\Model\SubscriptionPlanDetails;
use App\Model\SubscriptionCategory;
class SubscriptionPlanController extends Controller
{
   
public function getSubscriptionPlan(Request $request){
   
   $video_id = $request->video_id;
   $categoryId = $request->categoryId;
   //$status = false;
   $data = [];
   $subscription_detail = UserSubscriptionDetails::where('user_id',$request->user_id)->get();
  
   
   $subscribedvideo_id = PremiumVideos::where('id',$request->video_id)->with(['subscriptionplandetails.subscriptioncategory','subscriptionplandetails.subscriptionplan','subscriptionplandetails.additionalbenifits'])->first();
 
   // Admin has not added any subscription plan for the video
  $premiumVideoId=$subscribedvideo_id->id;
  $premiumWorkoutDetails = PremiumWorkoutDetails::where('premium_workout_id',$premiumVideoId)->where("category_id",$categoryId)->first();
  $IsPaid=$premiumWorkoutDetails->IsPaid;

  
   if($subscribedvideo_id->subscriptionplandetails->count() == null)
   {
    if($IsPaid==1)
    {
         
      $status = false;
      $data=[
      'status' => $status,
      'details' => $subscribedvideo_id,
      ];
    return Response::json(['code' => 200,'status' => true, 'message' => 'Free Videos','data'=>$data]);
    }
    else
    {
      $status = true;
      $data = [
      'status' => $status,
      'details' => $subscribedvideo_id,
      ];
    return Response::json(['code' => 200,'status' => true, 'message' => 'Free Videos','data'=>$data]); 
    }
   
   }
   
   
   
   // if user is subscribed
 
 if(isset($subscription_detail[0]->id))
  {
   
    
  //check every subscriptions details


  foreach($subscription_detail as $key => $subscription_details){
  
 
  // check video access details with user subscription id
   $videoAccessDetails = UserSubscribedVideosDetails::where('premium_video_id',$video_id)->where('user_subscription_id',$subscription_details->id)->with(['usersubscriptiondetails'])->with('premiumvideo')->first();
   
   
   
  
    // check whether it is accessible or not 
      if($videoAccessDetails != null){
     
      if($videoAccessDetails->access == true){
      $status = true;
      $data = [
      'status' => $status,
      'details' => $subscribedvideo_id,
      
      ];
   
      
      return Response::json(['code' => 200,'status' => true, 'message' => 'User is Valid for the video','data'=> $data]);
      
      }
  
  
  
  }


} 


     $status =false;
       $data = [
      'status' => $status,
      
      'details' => $subscribedvideo_id,
      
      ];
      return Response::json(['code' => 200,'status' => true, 'message' => 'User is not valid For the Video','data'=> $data]);

  
}
else
{
 
if($IsPaid==1)
    {
      $status = false;
      $data = [
      'status' => $status,
      'details' => $subscribedvideo_id,
      ];
    return Response::json(['code' => 200,'status' => true, 'message' => 'Free Videos','data'=>$data]);
    }
    else
    {
        
           
      $status = true;
      $data = [
      'status' => $status,
      'details' => $subscribedvideo_id,
      ];
        
    return Response::json(['code' => 200,'status' => true, 'message' => 'User is not valid For the Video','data'=>$data]); 
     }
     
      }   
   
   
}


}
