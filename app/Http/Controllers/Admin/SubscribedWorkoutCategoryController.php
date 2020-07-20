<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SubscriptionPlan;
use App\Model\SubscriptionCategory;
use App\Model\SubscribedWorkoutCategory;
use App\Model\Category;
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

       $data = [
      
       'subscription_category_id' =>$request->subscription_category_id,
       'subscription_plan_id'=>$request->subscription_plan_id,
       'categories_id'=>$request->categories_id,
       'created_at'=>Carbon::now(),
        ];   


      SubscribedWorkoutCategory::insert($data);

      return back()->with('status',100)->with('type','success')->with('message','Subscriptions and Wokrout Catgeory associated Successfully');

    }



    public function show(Request $request){
        
     $page     = 'subscription-workout-category';
     $sub_page = 'add-subscription-workout-category';

    $subscribedcategory = SubscribedWorkoutCategory::with(['workoutcategory','subscriptioncategory','subscriptionplan'])->get();

    return view('admin.subscribedworkoutcategory.show',compact('page','sub_page','subscribedcategory'));



    }
  





}
