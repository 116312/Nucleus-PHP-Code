<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SubscriptionPlan;
use App\Model\SubscriptionCategory;
use App\Model\SubscribedWorkoutCategory;
use App\Model\Category;
use App\Model\SubscriptionWorkoutPlan;
use Carbon\Carbon;
use App\Model\SubscriptionBenifits;
use App\Model\SubscriptionDetails;

class SubscribedWorkoutCategoryDetailsController extends Controller
{
    public function add($sub_id){

    	$page     = 'subscription-workout-category';
        $sub_page = 'add-subscription-workout-category';
    	$subscribedcategory = SubscriptionWorkoutPlan::with(['subscriptionworkoutcategory.subscriptioncategory','subscriptionworkoutcategory.workoutcategory','subscriptionplan'])->find($sub_id);
    	return view('admin.subscribedworkoutcategorydetails.add',compact('page','sub_page','subscribedcategory','sub_id'));

    }



    public function store(Request $request ,$sub_id){
      
      $per_month = $request->original_price * $request->offer_percentage;
      $plan_duration_price = $per_month * $request->number_of_month;

     $details = [
     
     'subscription_workout_plan_id' =>$sub_id,
     'original_price' => $request->original_price,
     'offer_percentage'=>$request->offer_percentage,
     'number_of_month'=>$request->number_of_month,
     'per_month_price'=>$per_month,
     'plan_duration_price'=> $plan_duration_price,
      'created_at'=> Carbon::now(),
      ];
      
      SubscriptionDetails::insert($details);

    foreach($request->benifits as $benifits){
     $data = [];
      $data = [
     'subscription_workout_plan_id' =>$sub_id,
     'benifits' => $benifits,
     'created_at'=> Carbon::now(),
      ];


      SubscriptionBenifits::insert($data);

      }




       return back()->with('status',100)->with('type','success')->with('message','Subscription Details and Benifits are saved successfully');

    }
}
