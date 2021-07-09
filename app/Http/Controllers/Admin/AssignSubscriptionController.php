<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\SubscriptionCategory;
use App\Model\SubscriptionPlan;
use App\Model\SubscriptionPlanDetails;
use App\Model\AdditionalBenifits;
use App\Model\UserSubscriptionDetails;
use App\Model\UserSubscriptionPlanDetails; 
use App\Model\SubscriptionWorkoutCategory;
use App\Model\UserSubscribedVideosDetails;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssignSubscriptionMail;



class AssignSubscriptionController extends Controller
{
	
     /**
     *assignSubscription (This function use for Load AssignSubscription page and fetch all subscription and also get susbscription plan)
     *
     * @param:-userId  {init} 
     *
     * @return JSON
     */
    public function assignSubscription($userId)
    {
    
        $subscription_category = SubscriptionCategory::all();
        $subscription_plan = SubscriptionPlan::all();
        return view('admin.assignSubscription.assign-subscription',compact('subscription_category','subscription_plan','userId'));
    }
    /**
    *addAssignSubscription function use  for add subscription data into database 
    *
    *@param init subscriptionCategoryId | {init} it is use for subscription category Id
    *@param:-init subscriptionPlanId | {init} it is use for subscription Plan Id
    *@param init days | {init } | it is use for how many day assign for subscription
    *in which i have added data into diffrent tabel for exapmle
     user_subscription_plan_details table,user_subscribed_videos_details,user_subscription_details table
    *@return error message.
    */
    public function addAssignSubscription(Request $request ,$userId)
    {
	 
    	$subscriptionCategoryId=$request->input("subscriptionCategoryId");
    	$subscriptionPlanId=$request->input("subscriptionPlanId");
    	$days=$request->input("days");
    	$product="Admin Subscription Plan";
    	$savedata= [
	     'user_id'=> $userId,
	     'payment_id'=> "Admin",
	     'transaction_id'=>"Admin",
	     'amount'=>"0.0",
	     'product'=> "Admin Subscription Plan",
	     'Device_Type'=>"Admin",
	     'created_at'=>Carbon::now(),
        ];
        $id= UserSubscriptionDetails::insertGetId($savedata);
        if($product == 'Admin Subscription Plan')
         {
           $subscriptionPlanDetails =  SubscriptionPlanDetails::where('subscription_category_id',$subscriptionCategoryId)->where('subscription_plan_id',$subscriptionPlanId)->with(['subscriptioncategory','subscriptionplan'])->first();

           $endDate=Carbon::now()->addMonths($subscriptionPlanDetails->number_of_month);
           $plandetails =[
           'user_subscription_id'=>$id,	
           'subscription_category_id'=>$subscriptionCategoryId,
           'subscription_plan_id'=>$subscriptionPlanId,
           'created_at'=>Carbon::now(),
           'start_date'=>Carbon::now(),
           'end_date'=>Carbon::now()->addDays($days),
            ];

            $x = UserSubscriptionPlanDetails::insertGetId($plandetails);
            $subscriptionworkoutcategories = SubscriptionWorkoutCategory::where('subscription_details_id',$subscriptionPlanDetails->id)->with(['workoutcategory.premiumworkoutdetails.premiumworkout'])->get();
            foreach($subscriptionworkoutcategories as $workoutcategory)
            {
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

          /*$details = [
                'transaction'=>UserSubscriptionDetails::find($id),
			    'subscriptionPlan'=>UserSubscriptionPlanDetails::find($x),
			    'uservideo'=>UserSubscribedVideosDetails::where('user_subscription_id',$id)->get(),
			];*/
//        return redirect()->to('assign-subscription/{{$userId}}')->with('message','Subscription has been Assigned this user');
             Mail::to('ashumehra768@outlook.com')->send(new AssignSubscriptionMail('Hello'));
             return redirect()->to('admin/all-users')->with('message','Subscription has been Assigned this user');
             
        //return back()->with('status',100)->with('type','success')->with('message','Subscription has been Assigned this user');


         }
    	

    }
}
