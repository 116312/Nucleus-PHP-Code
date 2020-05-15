<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TrainingPlan;
use App\Model\TrainingGoals;
use App\Model\TrainingGoalsPlan;
use Carbon\Carbon;
class TrainingGoalsController extends Controller
{
   

    public function add(){


    	$page ='training-goals';
    	$sub_page ='add-training-goals';

        $daysperweek = TrainingPlan::all();
    	return view('admin.traininggoals.add',compact('page','sub_page','daysperweek'));
    }



    public function store(Request $request){


    	$data = [

        'title' =>$request->title,
        'description'=>$request->description,
        'created_at'=>Carbon::now(),

    	];

     $id = TrainingGoals::insertGetId($data);

      foreach($request->training_plan_id as $plan_id){

       $plan_goal = [
      
       'training_goals_id'=>$id,
       'training_plan_id' =>$plan_id,
       'created_at'=> Carbon::now(),
       
       ];


       TrainingGoalsPlan::insert($plan_goal);

      }

 return back()->with('status',100)->with('type','success')->with('message','Training Goals added successfully');

    }



    public function show(){

      $page ='training-goals';
    	$sub_page ='add-training-goals';

        $goals = TrainingGoals::with('traininggoalsplan.trainingplan')->get();

    	return view('admin.traininggoals.show',compact('page','sub_page','goals'));

    }
}
