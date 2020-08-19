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
use App\Model\SubscriptionPlanDetails;
use App\Model\SubscriptionCategory;
class SubscriptionPlanController extends Controller
{
   



   public function getSubscriptionPlan(Request $request){
   $video_id = $request->video_id;
   $status = false;
   $data = [];
   $subscription_details = UserSubscriptionDetails::where('user_id',$request->user_id)->first();
   $videosubscriptioncategories_id=[];
  

   $subscribedvideo_id = PremiumVideos::where('id',$request->video_id)->with(['subscriptionplandetails.subscriptioncategory','subscriptionplandetails.subscriptionplan','subscriptionplandetails.additionalbenifits'])->first();
   
   
   
   
   
  
     
     
 
if($subscribedvideo_id->subscriptionplandetails->count() == null){

$status = false;
    $data = [
      'status' => $status,
      
      'details' => $subscribedvideo_id,
      
      ];
    return Response::json(['code' => 200,'status' => true, 'message' => 'Admin has not added any data for this video','data'=>$data]);
   
   }
     
     

 
   

 
 
 if($subscription_details != null){
 
    if($subscription_details->product == 'Subscription Plan'){
    
      $videoAccessDetails = UserSubscribedVideosDetails::where('premium_video_id',$video_id)->where('user_subscription_id',$subscription_details->id)->with(['usersubscriptiondetails.usersubscriptionplandetails'])->with('premiumvideo')->first();
      
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
      else{
      $status =false;
     $data = [
      'status' => $status,
      
      'details' => $subscribedvideo_id,
      
      ];
      return Response::json(['code' => 200,'status' => true, 'message' => 'User is not valid For the Video','data'=> $data]);
      }
      
    }
    
    
    
    if($subscription_details->product == 'Video'){
     
     
     $videoAccessDetails = UserSubscribedVideosDetails::where('premium_video_id',$video_id)->where('user_subscription_id',$subscription_details->id)->with([   'usersubscriptiondetails'])->with('premiumvideo')->first();
      if($videoAccessDetails != null){
      if($videoAccessDetails->access == true){
      $status = true;
      $data = [
      'status' => $status,
      
      'details' => $subscribedvideo_id,
      
      ];
      return Response::json(['code' => 200,'status' => true, 'message' => 'User is Valid for the video','data'=>$data]);
      
      }
      
      }
      
      else{
      
      $status =false;
     $data = [
      'status' => $status,
      
      'details' => $subscribedvideo_id,
      
      ];
      return Response::json(['code' => 200,'status' => true, 'message' => 'User is not valid For the Video','data'=>$data]);
      }
    
    }
 
 }
 
 
 
 else{
 
 
 
 
  $status =false;
      $data = [
      'status' => $status,
      
      'details' => $subscribedvideo_id,
      
      ];
      return Response::json(['code' => 200,'status' => true, 'message' => 'User is not valid For the Video','data'=>$data]);
 
 
 }
 
 





   





}


}
