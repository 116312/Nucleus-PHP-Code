<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\TrainingPlan;

class TrainingPlanController extends Controller
{
    

    public function add(){

    	$page = 'training-plan';

    	$sub_page = 'add-training-plan';


    	return view('admin.trainingplan.add',compact('page','sub_page'));
    }


    public function store(Request $request){

        $isexist = TrainingPlan::where('name',$request->name)->first();

        if($isexist != null){

        	 return back()->with('status',100)->with('type','danger')->with('message','Training Plan  already existed');
        }

         $data = [
         
         'name' => $request->name ,
         'created_at'=> Carbon::now(),

         ];


         TrainingPlan::insert($data);

          return back()->with('status',100)->with('type','success')->with('message','Training Plan  added Successfully');

    }




    public function show(){

     
        $page = 'training-plan';

    	$sub_page = 'show-training-plan';

    	$trainingplan = TrainingPlan::all();


    	return view('admin.trainingplan.show',compact('page','sub_page','trainingplan'));
    }





     public function edit($id){

        $page = 'training-plan';

    	$sub_page = 'show-training-plan';

    	$trainingplan = TrainingPlan::find($id);


    	return view('admin.trainingplan.edit',compact('page','sub_page','trainingplan'));



    }




    public function update(Request $request , $id){

       $isexist = TrainingPlan::where('id','!=',$id)->where('name',$request->name)->first();

        if($isexist != null){

        	 return back()->with('status',100)->with('type','danger')->with('message','Training Plan  already existed');
        }

         $data = [
         
         'name' => $request->name ,
         'updated_at'=> Carbon::now(),

         ];


         TrainingPlan::find($id)->update($data);

          return back()->with('status',100)->with('type','success')->with('message','Training Plan  updated Successfully');


    }



    public function delete($id){

       TrainingPlan::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Training Plan deleted Successfully');
  
}


    
}
