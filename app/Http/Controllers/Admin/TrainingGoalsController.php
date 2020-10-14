<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TrainingPlan;
use App\Model\TrainingGoals;
use App\Model\TrainingGoalsPlan;
use App\Model\TrainingGoalsDescription; 
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
        // 'description'=>$request->description,
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


      foreach($request->description as $description){
$goalsDescription = [
        'descriptions'=>$description,
        'training_goals_id'=>$id
      ];
TrainingGoalsDescription::insert($goalsDescription);
    }

 return back()->with('status',100)->with('type','success')->with('message','Training Goals added successfully');

    }



    public function show(){

      $page ='training-goals';
    	$sub_page ='add-training-goals';

        $goals = TrainingGoals::with('traininggoalsplan.trainingplan','descriptions')->get();

    	return view('admin.traininggoals.show',compact('page','sub_page','goals'));

    }


    public function edit($id){



    	$page ='training-goals';
    	$sub_page ='show-training-goals';

        $daysperweek = TrainingPlan::all();
        $goal = TrainingGoals::where('id',$id)->with('traininggoalsplan','descriptions')->first();


    	return view('admin.traininggoals.edit',compact('page','sub_page','daysperweek','goal'));
    }



    public function update(Request $request,$id){


    $data = [

        'title' =>$request->title,
        // 'description'=>$request->description,
        'created_at'=>Carbon::now(),

    	];

       TrainingGoals::where('id',$id)->update($data);
       TrainingGoalsPlan::where('training_goals_id', $id)->delete();
      foreach($request->training_plan_id as $plan_id){

       $plan_goal = [
      
       'training_goals_id'=>$id,
       'training_plan_id' =>$plan_id,
       'created_at'=> Carbon::now(),
       
       ];


       TrainingGoalsPlan::insert($plan_goal);


$olddescription =TrainingGoalsDescription::where('training_goals_id',$id)->get();
foreach($olddescription as $desc){
TrainingGoalsDescription::where('id',$desc->id)->delete();

}

       foreach($request->description as $description){
$goalsDescription = [
        'descriptions'=>$description,
        'training_goals_id'=>$id
      ];
TrainingGoalsDescription::insert($goalsDescription);
    }

      }

 return back()->with('status',100)->with('type','success')->with('message','Training Goals added successfully');
    }



     public function delete($id){

       TrainingGoals::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Training Plan deleted Successfully');
  
}
}
