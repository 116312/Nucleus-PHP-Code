<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserSubscriptionDetails;
use Carbon\Carbon;
use App\Model\UserSubscriptionPlanDetails; 
use Response;
use App\Model\SubscriptionPlanDetails;
use App\Model\UserSubscribedVideosDetails;
use App\Model\SubscriptionWorkoutCategory;

class UserSubscriptionDetailsController extends Controller
{


 
  public function __construct()
    {
        $userPlanDetails = UserSubscriptionPlanDetails::all();
        foreach($userPlanDetails as $details){
          $this->checkSubscriptionStatus($details);
        }
    }

	public function saveDetails(Request $request){


      $savedata= [
     'user_id'=> $request->user_id,
     'payment_id'=> $request->payment_id,
     'transaction_id'=> $request->transaction_id,
     'amount'=> $request->amount,
     'product'=> $request->product,
     'created_at'=>Carbon::now(),
      ];

      $id= UserSubscriptionDetails::insertGetId($savedata);





     if($request->product == 'Subscription Plan'){
      $subscriptionPlanDetails =  SubscriptionPlanDetails::where('subscription_category_id',$request->subscription_category_id)->where('subscription_plan_id',$request->subscription_plan_id)->with(['subscriptioncategory','subscriptionplan'])->first();


      $plandetails = [
      'user_subscription_id'=>$id,	
      'subscription_category_id'=>$request->subscription_category_id,
      'subscription_plan_id'=>$request->subscription_plan_id,
      'created_at'=>Carbon::now(),
      'start_date'=>Carbon::now(),
      'end_date'=>Carbon::now()->addMonths($subscriptionPlanDetails->number_of_month),
     
        ];

        $x = UserSubscriptionPlanDetails::insertGetId($plandetails);
        $subscriptionworkoutcategories     = SubscriptionWorkoutCategory::where('subscription_details_id',$subscriptionPlanDetails->id)->with(['workoutcategory.premiumworkoutdetails.premiumworkout'])->get();
        


        foreach($subscriptionworkoutcategories as $workoutcategory){
        
      foreach($workoutcategory->workoutcategory->premiumworkoutdetails as $premiumworkoutdetails)
{       
         $videodetails = [];

        $videodetails = [

       'user_subscription_id' =>$id,
       'premium_video_id'=>$premiumworkoutdetails->premiumworkout->id,
       'created_at'=>Carbon::now(),
        
        ];
     
       $video_id =UserSubscribedVideosDetails::insertGetId($videodetails);
}

         
        }
      

       $details = [

    'transaction' =>UserSubscriptionDetails::find($id),
    'subscription_plan'=>UserSubscriptionPlanDetails::find($x),
    'uservideo'=>UserSubscribedVideosDetails::where('user_subscription_id',$id)->get(),
     ]; 


         }


         else{

        $videodetails = [

       'user_subscription_id' =>$id,
       'premium_video_id'=>$request->premium_video_id,
       'created_at'=>Carbon::now(),
        
        ];
     
       $video_id =UserSubscribedVideosDetails::insertGetId($videodetails);
       
       
       $details = [

    'transaction' =>UserSubscriptionDetails::find($id),
    
    'uservideo'=>UserSubscribedVideosDetails::where('user_subscription_id',$id)->first(),
     ];

         }

    



       return Response::json(['code' => 200,'status' => true, 'message' => 'User Subscription Details','data'=>$details]);

   }

   public function checkSubscriptionStatus($userSubscriptionDetails){
      
      $date = new Carbon;
    if($date > $userSubscriptionDetails->end_date)
     {
        $this->expireSubscription($userSubscriptionDetails);
     } 

   }


   public function expireSubscription($userSubscriptionDetails){

     
     UserSubscriptionPlanDetails::where('id',$userSubscriptionDetails->id)->update(['status'=>false]);

     $videoAcess = UserSubscribedVideosDetails::where('user_subscription_id',$userSubscriptionDetails->id)->get();
     foreach($videoAcess as $video){

     UserSubscribedVideosDetails::where('id',$video->id)->update(['access'=>false]);

     }
 

   }

}
