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
use App\Model\PremiumWorkoutDetails;
use App\Model\SubscriptionVideo;

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


      $premiumvideos = PremiumWorkoutDetails::where('category_id',$request->categories_id)->with('premiumworkout')->get();

      foreach($premiumvideos as $video){
         $videodetails =[];
         $videodetails = [
        
          'premium_video_id'=> $video->premiumworkout->id,
          'subscription_details_id'=>$sub_id->id,
          'created_at' =>Carbon::now(),
            ];
         SubscriptionVideo::insert($videodetails);

      }


   
     
      return back()->with('status',100)->with('type','success')->with('message','Subscriptions and Wokrout Category associated Successfully');

    }



    public function show(Request $request){
        
     $page     = 'subscription-workout-category';
     $sub_page = 'add-subscription-workout-category';

    $subscribedcategory = SubscriptionWorkoutCategory::with(['workoutcategory','subscriptionplandetails.subscriptioncategory','subscriptionplandetails.subscriptionplan'])->get();
   

     return view('admin.subscribedworkoutcategory.show',compact('page','sub_page','subscribedcategory'));



    }
    
    
    
     public function delete($id){
      $x = SubscriptionWorkoutCategory::find($id);
      $premiumvideos = PremiumWorkoutDetails::where('category_id',$x->categories_id)->with('premiumworkout')->get();
 
        foreach($premiumvideos as $video){
        
       SubscriptionVideo::where('premium_video_id', $video->premiumworkout->id)->where('subscription_details_id',$x->subscription_details_id)->delete();

      }
      
      SubscriptionWorkoutCategory::where('id', $id)->delete();
     return back()->with('status',100)->with('type','success')->with('message','Record deleted Successfully');
  
  
    }


    public function edit($id){

      $page     = 'subscription-workout-category';
      $sub_page = 'add-subscription-workout-category';
      $subscriptionplans    = SubscriptionPlan::all();
      $subscriptioncategory = SubscriptionCategory::all();
      $workoutcategories    = Category::where('type','workout')->get();
      $subscribedcategory = SubscriptionWorkoutCategory::where('id',$id)->with(['workoutcategory','subscriptionplandetails.subscriptioncategory','subscriptionplandetails.subscriptionplan'])->first();
   

   
    return view('admin.subscribedworkoutcategory.edit',compact('page','sub_page','subscriptionplans','subscriptioncategory','workoutcategories','subscribedcategory'));



    }



    public function update(Request $request ,$id){

    $oldcategoryId = SubscriptionWorkoutCategory::find($id);

    $oldvideos = PremiumWorkoutDetails::where('category_id',$oldcategoryId->categories_id)->with('premiumworkout')->get();

    
      

      $sub_id = SubscriptionPlanDetails::where('subscription_category_id',$request->subscription_category_id)->where('subscription_plan_id',$request->subscription_plan_id)->first();

      $x = SubscriptionWorkoutCategory::find($id);
      $premiumvideos = PremiumWorkoutDetails::where('category_id',$x->categories_id)->with('premiumworkout')->get();
 
        foreach($premiumvideos as $video){
        
       SubscriptionVideo::where('premium_video_id', $video->premiumworkout->id)->where('subscription_details_id',$x->subscription_details_id)->delete();

      }

       $data = [
      
       'subscription_details_id' => $sub_id->id,
      
       'categories_id'=>$request->categories_id,
       'created_at'=>Carbon::now(),
        ];   


      SubscriptionWorkoutCategory::where('id',$id)->update($data);


      $premiumvideos = PremiumWorkoutDetails::where('category_id',$request->categories_id)->with('premiumworkout')->get();

      foreach($premiumvideos as $video){
         $videodetails =[];
         $videodetails = [
        
          'premium_video_id'=> $video->premiumworkout->id,
          'subscription_details_id'=>$sub_id->id,
          'created_at' =>Carbon::now(),
            ];
         SubscriptionVideo::insert($videodetails);

      }

return back()->with('status',100)->with('type','success')->with('message','Subscriptions and Wokrout Category updated Successfully');
    }



   




}
