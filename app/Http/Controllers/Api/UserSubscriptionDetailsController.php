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
      /*  $userPlanDetails = UserSubscriptionPlanDetails::all();
        foreach($userPlanDetails as $details){
          $this->checkSubscriptionStatus($details);
        }*/
    }

	public function saveDetails(Request $request){
$receipt = null;
if($request->receipt != null){

$receipt = json_encode($request->receipt);
}
      $savedata= [
     'user_id'=> $request->user_id,
     'payment_id'=> $request->payment_id,
     'transaction_id'=> $request->transaction_id,
     'amount'=> $request->amount,
     'product'=> $request->product,
     'receipt'=> $receipt,
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
        $subscriptionworkoutcategories = SubscriptionWorkoutCategory::where('subscription_details_id',$subscriptionPlanDetails->id)->with(['workoutcategory.premiumworkoutdetails.premiumworkout'])->get();
        


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

     
    // UserSubscriptionPlanDetails::where('id',$userSubscriptionDetails->id)->update(['status'=>false]);

     $videoAcess = UserSubscribedVideosDetails::where('user_subscription_id',$userSubscriptionDetails->id)->get();
     foreach($videoAcess as $video){

     UserSubscribedVideosDetails::where('id',$video->id)->update(['access'=>false]);

     }
 

   }
    //Date:-22-12-2020 by Mishra Ankit Kumar
   public function getUserSubscriptionDetail(Request $request)
   {
        $userID=$request->userID;
        $data = UserSubscriptionDetails::where('user_id',$userID)->first();
        if($data!=null)
        {
            $userSubscriptionDetailsId=$data->id;
            $UserSubscriptionPlanDetails=UserSubscriptionPlanDetails::where('user_subscription_id',$userSubscriptionDetailsId)->first();
            return Response::json(['code' => 200,'status' => true, 'message' => 'User Subscription Detail ','data'=>$UserSubscriptionPlanDetails]);
        }
        else
        {
             return Response::json(['code' => 400,'status' => false, 'message' => 'No Subscription']);
        }
      
   }
   public function cancelSubscriptionPlan(Request $request)
   {
       $UserSubscriptionPlanDetailsId=$request->UserSubscriptionPlanDetailsId;
       $status=$request->status;
       $UserSubscriptionPlanDetailsStatus=array(
           "status"=>$status
           );
           UserSubscriptionPlanDetails::where('id',$UserSubscriptionPlanDetailsId)->update($UserSubscriptionPlanDetailsStatus);
           if($request->status == false){
        $user_subscription_id =  UserSubscriptionPlanDetails::where('id',UserSubscriptionPlanDetailsId)->first()->user_subscription_id;
          $this->expireSubscription($user_subscription_id);
           }
          return Response::json(['code' => 200,'status' => true, 'message' => 'User Subscription Plan Details has been Changed.']); 
   }
  public function GetSubscriptionReceipt(Request $request)
   {
         $userID=$request->userID;
         $data = UserSubscriptionDetails::where('user_id',$userID)->first();
        if($data!=null)
        {
            $receipt=$data->receipt;
            return Response::json(['code' => 200,'status' => true, 'message' => 'User Subscription Receipt',"receipt"=>$receipt]);
        }
        else
        {
             return Response::json(['code' => 400,'status' => false, 'message' => 'No Subscription']);
        }
   }
    

}
