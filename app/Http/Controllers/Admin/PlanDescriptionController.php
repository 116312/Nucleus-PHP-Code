<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\TrainingPlan;
use App\Model\TrainingPlanDescription;
use Carbon\Carbon;

class PlanDescriptionController extends Controller
{
    
    public function add($training_plan_id){

        $page = 'training-plan';

    	$sub_page = 'show-training-plan';

    	$plan = TrainingPlan::find($training_plan_id);

    	$categories = Category::all();


        
        return view('admin.plandescription.add',compact('page','sub_page','categories','plan'));

    }



    public function store(Request $request , $training_plan_id){


    	$data = [
         'training_plan_id' =>$training_plan_id,
         'monday'=> $request->monday,
         'tuesday'=> $request->tuesday,
         'wednesday'=> $request->wednesday,
         'thursday'=> $request->thursday,
         'friday'=> $request->friday,
         'saturday'=> $request->saturday,
         'sunday'=> $request->sunday,
         'created_at'=>Carbon::now(),


    	];



    	TrainingPlanDescription::insert($data);

    	  return back()->with('status',100)->with('type','success')->with('message','Training Plan Description  added Successfully');

}



   public function show($training_plan_id){



        $page = 'training-plan';

    	$sub_page = 'show-training-plan';

    	$trainingplan = TrainingPlan::find($training_plan_id);
       
        $plandescription = TrainingPlanDescription::where('training_plan_id',$training_plan_id)->get();

    


        
        return view('admin.plandescription.show',compact('page','sub_page','plandescription','trainingplan'));



   }



  public function edit($training_plan_id,$training_plan_description_id){



        $page = 'training-plan';

    	$sub_page = 'show-training-plan';

    	
        $plandescription = TrainingPlanDescription::where('id',$training_plan_description_id)->first();

    
        $plan = TrainingPlan::find($training_plan_id);

    	$categories = Category::all();
  

        
        return view('admin.plandescription.edit',compact('page','sub_page','plan','plandescription','categories'));    


  }





  public function update(Request $request ,$training_plan_id,$training_plan_description_id){

        $data = [
         'training_plan_id' =>$training_plan_id,
         'monday'=> $request->monday,
         'tuesday'=> $request->tuesday,
         'wednesday'=> $request->wednesday,
         'thursday'=> $request->thursday,
         'friday'=> $request->friday,
         'saturday'=> $request->saturday,
         'sunday'=> $request->sunday,
         'updated_at'=>Carbon::now(),


    	];



    	TrainingPlanDescription::where('id',$training_plan_description_id)->update($data);

    	  return back()->with('status',100)->with('type','success')->with('message','Training Plan Description  updated Successfully');


  }



  public function delete($training_plan_id,$training_plan_description_id){


  	TrainingPlanDescription::where('id', $training_plan_description_id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Training Plan  Description deleted Successfully');
  }

}