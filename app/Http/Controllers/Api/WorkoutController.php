<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\PremiumWorkoutDetails;
use App\Model\UserSubscribedVideosDetails;
use App\Model\UserSubscriptionDetails;
use App\Model\TrainingPlan;
use App\Model\TrainingGoals;
use App\Model\QuickClipWorkoutDetails;
use App\User;
use Response;
use DB;
class WorkoutController extends Controller
{
    public function getworkoutbycategory(Request $request){
      
        $detail = Category::find($request->cate_id);
       
        $user = User::where('id',$request->user_id)->first();

       if($detail->name == 'ALL WORKOUTS'){


                $workouts = [];
                $premiumworkouts1=array();

      $premiumworkouts = PremiumWorkoutDetails::where('category_id','!=',15)->orderBy('category_id','asc')->with('premiumworkout.subtitle','workoutcategory.unspecifiedcategoryimage','workouttype','chapters')->get();
      $quickclipworkouts = QuickClipWorkoutDetails::orderBy('category_id','asc')->with('quickclipworkoutclip.quickclips')->get();
      $subscriptionUser=UserSubscriptionDetails::where('user_id',$request->user_id)->first();
       if($subscriptionUser==!null)
      {
      $UserSubscriptionDetailID=$subscriptionUser->id;
      foreach($premiumworkouts as $premi)
      {
        
        $premium_workout_id=$premi->premium_workout_id;
      
        $wordCount = UserSubscribedVideosDetails::where([
                    ['user_subscription_id', '=',$UserSubscriptionDetailID],
                    ['premium_video_id', '=',$premium_workout_id]
                ])->count();
                
                
        if($wordCount)
        {
            $premi['status']=true;
          
        }
        else
        {
             $premi['status']=false;  
        }
         $premiumworkouts1[]=$premi;    
      }
  }
     


      $workouts = [
        'premiumworkouts' =>$premiumworkouts,
        'quickclipworkouts'=>$quickclipworkouts,
         ];


      return Response::json(['code' => 200,'status' => true, 'message' => 'All Workouts','data'=>$workouts]);

        }


   



   
   if($detail->type =='other'){

     $data = [];
    $how_many_days =TrainingPlan::with('trainingplanvariation')->get();
    $bygoals =TrainingGoals::with('traininggoalsplan.trainingplan.trainingplanvariation','descriptions')->get();
    $user_plan_variation=DB::table('user_plan_variation')->where('user_id', $request->user_id)->first();
    $daysperweek = UserDaysPerWeek::where('user_id',$request->user_id)->first();
    if(!empty($daysperweek))
    {
    $days_per_week_id=$daysperweek->days_per_week_id;
    $TrainingPlanName = TrainingPlan::where('id',$days_per_week_id)->first();
    $TrainingPlanName =$TrainingPlanName->name;
    $TrainingPlanName=$TrainingPlanName;
    }
    else
    {
      $TrainingPlanName=null;
    }
    $trainingplanvariation=array();
    if(!empty($user_plan_variation))
    {
    $planVariationId=$user_plan_variation->plan_variation_id;
    $trainingplanvariation=DB::table('training_plan_desription')->where('id',$planVariationId)->first();
    $trainingPlanId=$trainingplanvariation->training_plan_id;
    $trainingplanvariation=DB::table('training_plan_desription')->where('training_plan_id',$trainingPlanId)->get();
    }
    $Goal =UserTrainingGoal::where('user_id',$request->user_id)->first();
    if(!empty($Goal))
    {
    $trainingGoalsId=$Goal->goal_id;
    }
    else
    {
        $trainingGoalsId=0;
    }
   
    
    
    
    $data = [
    'how_many_days'=>$how_many_days,
    'bygoals'=>$bygoals,
    "user_plan_variation"=>$user_plan_variation
    ];
    

    

 return Response::json(['code' => 200,'status' => true, 'message' => 'Training Plans and Goals','TrainingPlanName'=>$TrainingPlanName,'trainingGoalsId'=>$trainingGoalsId,'trainingplanvariation'=>$trainingplanvariation,'data'=>$data]);
     
    


    


      

    }



    if($detail->type == 'workout'){

      $workouts = [];

      $premiumworkouts = PremiumWorkoutDetails::where('category_id',$request->cate_id)->with('premiumworkout.subtitle','workoutcategory.unspecifiedcategoryimage','workouttype','chapters')->get();

      $quickclipworkouts = QuickClipWorkoutDetails::where('category_id',$request->cate_id)->with('quickclipworkoutclip.quickclips')->get();

     

      $workouts = [
        'premiumworkouts' =>$premiumworkouts,
        'quickclipworkouts'=>$quickclipworkouts,
         ];


      return Response::json(['code' => 200,'status' => true, 'message' => 'All Workouts','data'=>$workouts]);

    }


}
}
