<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\WorkoutLevel;
use Response;
use Carbon\Carbon;

class WorkoutLevelController extends Controller
{
    public function add(){

       $page = 'workout-level';

      $subpage = 'add-workout-level';


      return view('admin.workoutlevel.add',compact('page','subpage'));

    }



    public function store(Request $request){

    	$isalreadyexisted = WorkoutLevel::where('name',$request->name)->first();

    	if($isalreadyexisted != null){

    		return back()->with('status',100)->with('type','success')->with('message','Workout Level already existed');
    	}

          $data = [
          'name' => $request->name,
          'created_at'=>Carbon::now(),
         ];


         WorkoutLevel::insert($data);

         return back()->with('status',100)->with('type','success')->with('message','Workout Level added successfully');





    }



     public function show(){
      
      $page = 'workout-level';
      $subpage = 'show-workout-level';

      $workoutlevels = WorkoutLevel::all();

      return view('admin.workoutlevel.show',compact('page','subpage','workoutlevels'));


    }



    public function edit($id){


      $page = 'workout-level';
      $subpage = 'show-workout-level';

      $workoutlevel = WorkoutLevel::find($id);

      return view('admin.workoutlevel.edit',compact('page','subpage','workoutlevel'));
    }



    public function update(Request $request , $id){

      $isalreadyexisted = WorkoutLevel::where('id','!=',$id)->where('name',$request->name)->first();

    	if($isalreadyexisted != null){

    		return back()->with('status',100)->with('type','success')->with('message','Workout Level already existed');
    	}

          $data = [
          'name' => $request->name,
          'updated_at'=>Carbon::now(),
         ];


         WorkoutLevel::where('id',$id)->update($data);

         return back()->with('status',100)->with('type','success')->with('message','Workout Level updated successfully');


    }



     public function delete($id){

     WorkoutLevel::where('id', $id)->delete();
     return back()->with('status',100)->with('type','success')->with('message','Workout Level  deleted Successfully');



    }

}
