<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\PremiumWorkoutDetails;
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

      $premiumworkouts = PremiumWorkoutDetails::where('category_id','!=',15)->orderBy('category_id','asc')->with('premiumworkout.subtitle','workoutcategory.unspecifiedcategoryimage','workouttype','chapters')->get();

      $quickclipworkouts = QuickClipWorkoutDetails::orderBy('category_id','asc')->with('quickclipworkoutclip.quickclips')->get();

     


      $workouts = [
        'premiumworkouts' =>$premiumworkouts,
        'quickclipworkouts'=>$quickclipworkouts,
         ];


      return Response::json(['code' => 200,'status' => true, 'message' => 'All Workouts','data'=>$workouts]);

        }


   



   
   if($detail->type =='other'){

    $data = [];
    $how_many_days = TrainingPlan::with('trainingplanvariation')->get();
    $bygoals = TrainingGoals::with('traininggoalsplan.trainingplan.trainingplanvariation','descriptions')->get();
    $user_plan_variation = DB::table('user_plan_variation')->where('user_id', $request->user_id)->first();
   
    $data = [
    'how_many_days'=>$how_many_days,
    'bygoals'=>$bygoals,
    "user_plan_variation"=>$user_plan_variation
    ];
    

    

 return Response::json(['code' => 200,'status' => true, 'message' => 'Training Plans and Goals','data'=>$data]);
     
    


      

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
