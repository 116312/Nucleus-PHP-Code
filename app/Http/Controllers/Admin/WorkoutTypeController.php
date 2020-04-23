<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\WorkoutType;
use Carbon\Carbon;

class WorkoutTypeController extends Controller
{
    
    public function add(){

      $page = 'workout-type';

      $subpage = 'add-workout-type';


      return view('admin.workouttype.add',compact('page','subpage'));


    }




    public function store(Request $request){

     $isnamealreadyexist = WorkoutType::where('name',$request->name)->first();

     if($isnamealreadyexist != null){

           return back()->with('status',100)->with('type','success')->with('message','Workout Type already exist');

     }


     $issequencealreadyexist = WorkoutType::where('sequence_no',$request->sequence_no)->first();

     if($issequencealreadyexist != null){

            return back()->with('status',100)->with('type','success')->with('message','Sequence Number already exist');

     }
        
        $data = [
        'name' => $request->name,
        'sequence_no' => $request->sequence_no,
        'created_at' => Carbon::now(),
        ];


        WorkoutType::insert($data);

        return back()->with('status',100)->with('type','success')->with('message','Workout Type added successfully');


    }




    public function show(){
      
      $page = 'workout-type';
      $subpage = 'show-workout-type';

      $workouttypes = WorkoutType::all();

      return view('admin.workouttype.show',compact('page','subpage','workouttypes'));


    }



    public function edit($id){
     
      $page = 'workout-type';
      $subpage = 'show-workout-type';
      $workouttype = WorkoutType::find($id);

      return view('admin.workouttype.edit',compact('page','subpage','workouttype'));



    }



    public function update(Request $request ,$id){
      $isnamealreadyexist = WorkoutType::where('id','!=',$id)->where('name',$request->name)->first();

     if($isnamealreadyexist != null){

           return back()->with('status',100)->with('type','danger')->with('message','Workout Type already exist');

     }


     $issequencealreadyexist = WorkoutType::where('id','!=',$id)->where('sequence_no',$request->sequence_no)->first();

     if($issequencealreadyexist != null){

            return back()->with('status',100)->with('type','success')->with('message','Sequence Number already exist');

     }
        
        $data = [
        'name' => $request->name,
        'sequence_no' => $request->sequence_no,
        'created_at' => Carbon::now(),
        ];


        WorkoutType::find($id)->update($data);

        return back()->with('status',100)->with('type','success')->with('message','Workout Type updated successfully');

  

    }


    public function delete($id){

     WorkoutType::where('id', $id)->delete();
     return back()->with('status',100)->with('type','success')->with('message','Workout Type  deleted Successfully');



    }
}
