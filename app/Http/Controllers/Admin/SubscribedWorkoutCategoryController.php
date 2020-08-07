<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SubscriptionPlan;
use App\Model\SubscriptionCategory;
use App\Model\SubscriptionWorkoutCategory;
use App\Model\Category;
use App\Model\SubscriptionPlanDetails;
use Carbon\Carbon;

class SubscribedWorkoutCategoryController extends Controller
{
    



    public function add(){
    
     $page     = 'subscription-workout-category';
     $sub_page = 'add-subscription-workout-category';
     

     $subscriptionplans    = SubscriptionPlan::all();
     $subscriptioncategory = SubscriptionCategory::all();
     $workoutcategories    = Category::where('type','workout')->get();


    return view('admin.subscribedworkoutcategory.add',compact('page','sub_page','subscriptionplans','subscriptioncategory','workoutcategories'));




    }


    public function store(Request $request){
     

     $sub_id = SubscriptionPlanDetails::where('subscription_category_id',$request->subscription_category_id)->where('subscription_plan_id',$request->subscription_plan_id)->first();

       $data = [
      
       'subscription_details_id' => $sub_id->id,
      
       'categories_id'=>$request->categories_id,
       'created_at'=>Carbon::now(),
        ];   


      SubscriptionWorkoutCategory::insert($data);


   
     
      return back()->with('status',100)->with('type','success')->with('message','Subscriptions and Wokrout Category associated Successfully');

    }



    public function show(Request $request){
        
     $page     = 'subscription-workout-category';
     $sub_page = 'add-subscription-workout-category';

    $subscribedcategory = SubscriptionWorkoutCategory::with(['workoutcategory','subscriptionplandetails.subscriptioncategory','subscriptionplandetails.subscriptionplan'])->get();
   

    return view('admin.subscribedworkoutcategory.show',compact('page','sub_page','subscribedcategory'));



    }



   




}
