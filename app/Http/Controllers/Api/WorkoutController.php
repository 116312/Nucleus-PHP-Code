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
class WorkoutController extends Controller
{
    public function getworkoutbycategory(Request $request){
      
      $detail = Category::find($request->cate_id);
       
        $user = User::where('id',$request->user_id)->first();

       if($detail->name == 'ALL WORKOUTS'){


               if($user->gender == null){
          
                  
                  $categories = Category::where('name','!=','ALL WORKOUTS')->orderBy('sequence_no', 'asc')->with('unspecifiedcategoryimage')->get();

                }



              if($user->gender == 'Female'){
                     
                 $categories = Category::where('name','!=','ALL WORKOUTS')->orderBy('sequence_no', 'asc')->with('femalecategoryimage')->get();

              }



              if($user->gender == 'Male'){

                  $categories = Category::where('name','!=','ALL WORKOUTS')->orderBy('sequence_no', 'asc')->with('malecategoryimage')->get();

              }
      


      $categories = Category::where('name','!=','ALL WORKOUTS')->orderBy('sequence_no', 'asc')->with('unspecifiedcategoryimage')->get();
    
      return Response::json(['code' => 200,'status' => true, 'message' => 'All categories','data'=>$categories]);

   }


   



   
   if($detail->type =='other'){

    $data = [];
    $how_many_days = TrainingPlan::with('trainingplanvariation')->get();
    $bygoals = TrainingGoals::with('traininggoalsplan.trainingplan.trainingplanvariation')->get();
    $data = [
    'how_many_days'=>$how_many_days,
    'bygoals'=>$bygoals,
    ];

    

 return Response::json(['code' => 200,'status' => true, 'message' => 'Training Plans and Goals','data'=>$data]);
      

    }



    if($detail->type == 'workout'){

      $workouts = [];

      $premiumworkouts = PremiumWorkoutDetails::where('category_id',$request->cate_id)->with('premiumworkout.subtitle','workoutcategory','workouttype')->get();

      $quickclipworkouts = QuickClipWorkoutDetails::where('category_id',$request->cate_id)->with('quickclipworkoutclip.quickclips')->get();

     


      $workouts = [
'premiumworkouts' =>$premiumworkouts,
'quickclipworkouts'=>$quickclipworkouts,
        
      ];


      return Response::json(['code' => 200,'status' => true, 'message' => 'All Workouts','data'=>$workouts]);

    }


}
}
