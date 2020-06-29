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


    	



    	$typedata = [

        'user_id'=>$request->user_id,
        'training_type'=>$request->plan_type,
        'created_at'=> Carbon::now(),
    	];

     $type = UserTrainingType::insertGetId($typedata);

     $goal = '';

       if($request->plan_type = "By Goals")
    {
    	$goaldata = [
        'user_id'=>$request->user_id,
        'goal_id'=>$request->goal_id,
        'created_at'=> Carbon::now(),
         ];

      
    $goal = UserTrainingGoal::insertGetId($goaldata);

    }



    $daysperweekdata = [

    'user_id'=>$request->user_id,
    'days_per_week_id'=>$request->days_per_week_id,
    'created_at'=> Carbon::now(),

       ];

    $daysperweek = UserDaysPerWeek::insertGetId($daysperweekdata);


    $planvariationdata = [

    'user_id'=>$request->user_id,
    'plan_variation_id'=>$request->plan_variation_id,
    'created_at'=> Carbon::now(),

    ];


    $planvariation = UserPlanVariation::insertGetId($planvariationdata);

    
    $data = [


    'type' =>UserTrainingType::find($type),
    'goal'=>UserTrainingGoal::find($goal),
    'daysperweek'=>UserDaysPerWeek::find($daysperweek),
    'planvariationdata'=>UserPlanVariation::find($planvariationdata),


    ];


     return Response::json(['code' => 200,'status' => true, 'message' => 'User Sucessfully Selected Training and Plan','data'=>$data]);



    }
}
