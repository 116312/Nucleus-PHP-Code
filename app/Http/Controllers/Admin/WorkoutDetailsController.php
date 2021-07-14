<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\WorkoutType;
use App\Model\WorkoutDetails;
use App\Model\Category;
use App\Model\PremiumWorkoutDetails;
use App\Model\QuickClipWorkoutDetails;



use Response;
use Carbon\Carbon;


class WorkoutDetailsController extends Controller
{
    public function add(){

       $page = 'workout-details';
       $subpage = 'add-workout-details';

       $workout_types = WorkoutType::all();
      $categories = Category::where('type','workout')->get();

       return view('admin.workoutdetails.add',compact('page','subpage','workout_types','categories'));

    }


    public function store(Request $request){


    	$isalreadyexist = WorkoutDetails::where('workout_type_id',$request->workout_type_id)->where('name',$request->name)->first();

    	if($isalreadyexist != null){

    		 return back()->with('status',100)->with('type','success')->with('message','Workout Details is already existed');

    	}

    	$data = [

        'workout_type_id' => $request->workout_type_id,
        'name' => $request->name,
        'created_at'=>Carbon::now(),

    	];
    
      WorkoutDetails::insert($data);

      return back()->with('status',100)->with('type','success')->with('message','Workout Details is added Successfully');


    }



    public function show(){

    	  $page = 'workout-details';
          $subpage = 'show-workout-details';

          $workoutdetails = WorkoutDetails::with(['workouttype'])->get();
          return view('admin.workoutdetails.show',compact('page','subpage','workoutdetails'));
    }



    public function getworkouts($workout_type_id){

     $workouttype = WorkoutType::find($workout_type_id);

     if($workouttype->name == 'Premium Workout'){

     $workouts = PremiumWorkoutDetails::all();

     }

     else{

     $workouts = QuickClipWorkoutDetails::all();

     }



      return response()->json(['workouts'=>$workouts]);

    }
}
