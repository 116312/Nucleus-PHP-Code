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
/**
 * saveDetails function use for store subscription details
 * in this function store subscription detail into different tabel
 * like:-user_subscription_details,user_subscription_plan_details,user_subscribed_videos_details
 * @param:-user_id | login user id
 * @param:-payment_id | Payment Id
 * @param:-transaction_id || Transaction Id 
 * @param:-amount,product,receipt,
 * @param:-deviceType || use for Device Type like IOS or Android
 * @param:-subscription_category_id
 * @param:-subscription_plan_id
 * @return JSON
 */
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
     'Device_Type'=>$request->deviceType,
     'created_at'=>Carbon::now(),
      ];
     $user_id=$request->user_id;
     $id= UserSubscriptionDetails::insertGetId($savedata);
     if($request->product == 'Subscription Plan'){
     $subscriptionPlanDetails =  SubscriptionPlanDetails::where('subscription_category_id',$request->subscription_category_id)->where('subscription_plan_id',$request->subscription_plan_id)->with(['subscriptioncategory','subscriptionplan'])->first();

      $endDate=Carbon::now()->addMonths($subscriptionPlanDetails->number_of_month);
      $plandetails = [
      'user_subscription_id'=>$id,	
      'subscription_category_id'=>$request->subscription_category_id,
      'subscription_plan_id'=>$request->subscription_plan_id,
      'created_at'=>Carbon::now(),
      'start_date'=>Carbon::now(),
      'end_date'=>$endDate->addDays(5),
     
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
   /**
    * expireSubscription is Cron job function 
    * it is use for Automatic Video Access Stop when Subscription end_date Will be pass 
    * @return void
    */ 
    public function expireSubscription(Request $request){
       $userSubscriptionDetailsData=UserSubscriptionDetails::all();
       foreach($userSubscriptionDetailsData as $SubscriptionDetailsData)
       {
         $userId=$SubscriptionDetailsData['user_id'];
         $userSubscriptionDetailsId=$SubscriptionDetailsData['id'];
         $UserSubscriptionPlanDetails=UserSubscriptionPlanDetails::where('user_subscription_id',$userSubscriptionDetailsId)->first();
         $subscriptionEndDate=$UserSubscriptionPlanDetails['end_date'];
         $date = new Carbon;
         if($date > $subscriptionEndDate)
         {
             
           $videoAcess = UserSubscribedVideosDetails::where('user_subscription_id',$userSubscriptionDetailsId)->get();
           foreach($videoAcess as $video)
           {
            
                 UserSubscribedVideosDetails::where('id',$video->id)->update(['access'=>false]);

           }
          
         } 
       }
     

   }
    /**
     * getUserSubscriptionDetail function use for get all Subscription detail
     * @param:-user_id| use for Login User id
     * @return Void
     */
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
   /**
    *cancelSubscriptionPlan function use for Cancel user Subscription Plan
    * @param:-UserSubscriptionPlanDetailsId 
    * @return Void
    */
   public function cancelSubscriptionPlan(Request $request)
   {
       $UserSubscriptionPlanDetailsId=$request->UserSubscriptionPlanDetailsId;
       $status=$request->status;
       $UserSubscriptionPlanDetailsStatus=array(
           "status"=>$status
           );
           UserSubscriptionPlanDetails::where('id',$UserSubscriptionPlanDetailsId)->update($UserSubscriptionPlanDetailsStatus);
           if($request->status == false){
          $user_subscription_id =  UserSubscriptionPlanDetails::where('id',$UserSubscriptionPlanDetailsId)->first()->user_subscription_id;
        /*  $this->expireSubscription($user_subscription_id);*/
           }
          return Response::json(['code' => 200,'status' => true, 'message' => 'User Subscription Plan Details has been Changed.']); 
   }
   /**
    *GetSubscriptionReceipt functon use for get Subscription Receipt
    * @userID | use for Login user Id
    * @return void
    */ 
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
