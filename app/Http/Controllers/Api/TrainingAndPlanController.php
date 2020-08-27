<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserTrainingType;
use App\Model\UserTrainingGoal;
use App\Model\UserDaysPerWeek;
use App\Model\UserPlanVariation;
use Carbon\Carbon;
use Response;

class TrainingAndPlanController extends Controller
{
    


    public function submit(Request $request){
       $goal = '';
      
       $userAlreadyexist  = UserTrainingType::where('user_id',$request->user_id)->first();

        $typedata = [

        'user_id'=>$request->user_id,
        'training_type'=>$request->plan_type,
        'created_at'=> Carbon::now(),
    	];

   

    

       if($request->plan_type == "By Goals")
    {
       $usergoalexist = UserTrainingGoal::where('user_id',$request->user_id)->first();

    	$goaldata = [
        'user_id'=>$request->user_id,
        'goal_id'=>$request->goal_id,
        'created_at'=> Carbon::now(),
         ];

      if($usergoalexist != null){
     

       UserTrainingGoal::where('user_id',$request->user_id)->update($goaldata);

      }

      else{
 

      $goal = UserTrainingGoal::insert($goaldata);


      }

        

      
   
    }

    else{

     $usergoalexist = UserTrainingGoal::where('user_id',$request->user_id)->first();

     if($usergoalexist != null){
     

       UserTrainingGoal::where('user_id',$request->user_id)->delete();

      }


    }



    $daysperweekdata = [

    'user_id'=>$request->user_id,
    'days_per_week_id'=>$request->days_per_week_id,
    'created_at'=> Carbon::now(),

       ];

  


    $planvariationdata = [

    'user_id'=>$request->user_id,
    'plan_variation_id'=>$request->plan_variation_id,
    'created_at'=> Carbon::now(),

    ];
    
   
   if($userAlreadyexist == null){

    $type = UserTrainingType::insert($typedata);
    $daysperweek = UserDaysPerWeek::insert($daysperweekdata);
    $planvariation = UserPlanVariation::insert($planvariationdata);

  
   

   }




   else {

   

    UserTrainingType::where('user_id',$request->user_id)->update($typedata);
    UserDaysPerWeek::where('user_id',$request->user_id)->update($daysperweekdata);
    UserPlanVariation::where('user_id',$request->user_id)->update($planvariationdata);
   


  
  

}
    
   


    $data = [


    'type' =>UserTrainingType::where('user_id',$request->user_id)->first(),
    'goal'=>UserTrainingGoal::where('user_id',$request->user_id)->first(),
    'daysperweek'=>UserDaysPerWeek::where('user_id',$request->user_id)->first(),
    'planvariationdata'=>UserPlanVariation::where('user_id',$request->user_id)->first(),


    ];


     return Response::json(['code' => 200,'status' => true, 'message' => 'User Sucessfully Selected Training and Plan','data'=>$data]);



    }



    public function getTrainingPlan(Request $request){


      $type =UserTrainingType::where('user_id',$request->user_id)->first();
      $goal =UserTrainingGoal::where('user_id',$request->user_id)->first();
      $daysperweek = UserDaysPerWeek::where('user_id',$request->user_id)->first();
      $planvariationdata = UserPlanVariation::where('user_id',$request->user_id)->first();

    $data = [


    'type' =>$type,
    'goal'=>$goal,
    'daysperweek'=>$daysperweek,
    'planvariationdata'=>$planvariationdata,


    ];


     return Response::json(['code' => 200,'status' => true, 'message' => 'User  Selected Training and Plan','data'=>$data]);   

    }
}
