<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PremiumVideos;
use Carbon\Carbon;
use App\Model\WorkoutType;
use App\Model\Category;
use App\Model\PremiumWorkoutDetails;
use Storage;

class PremiumWorkoutDetailsController extends Controller
{
    /**
     * undocumented constant
     **/
    

    public function add(){


    	$page = 'premium-workout-details';

    	 $sub_page = 'add-premium-workout-details';
         $workout_types = WorkoutType::all();
         $categories = Category::where('type','workout')->get();
         $premium_videos = PremiumVideos::all();
    	return view('admin.premiumworkoutdetails.add',compact('page','sub_page','workout_types','categories','premium_videos'));
    }



    public function store(Request $request){

          
    	$isalreadyexist = PremiumWorkoutDetails::where('name',$request->name)->first();
        $name = PremiumVideos::where('id',$request->premium_workout_id)->first()->name;
    	if($isalreadyexist != null){
    	   return back()->with('status',100)->with('type','success')->with('message','Premium Workout Details already exist');	
    	}
         
            $imagePath = '';
         	if($request->hasFile('image')){
          
            $ext = $request->image->getClientOriginalExtension();


            $path = Storage::putFileAs('premiumimages', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;

                  }



    	$data = [
        
        'name' => $name,
        'image' => $imagePath,
        'premium_workout_id'=>$request->premium_workout_id,
        'category_id'=>$request->category_id,
        'workout_type_id'=>$request->workout_type_id,
        'workout_level'=>$request->workout_level,
        'trainer_name'=>$request->trainer_name,
        'description'=>$request->description,
        'created_at'=> Carbon::now(),
       

    	];


    	PremiumWorkoutDetails::insert($data);
        

        return back()->with('status',100)->with('type','success')->with('message','Premium Workout Details added successfully');



    }




    public function show(){
      
      	$page = 'premium-workout-details';

    	$sub_page = 'show-premium-workout-details';

        $premiumworkoutdetails = PremiumWorkoutDetails::with('premiumworkout','workoutcategory','workouttype')->get();


        
    	return view('admin.premiumworkoutdetails.show',compact('page','sub_page','premiumworkoutdetails'));


    }


    public function edit($id){

      $page = 'premium-workout-details';
      $sub_page = 'show-premium-workout-details';
      $workout_types = WorkoutType::all();
      $categories = Category::where('type','workout')->get();
      $premium_videos = PremiumVideos::all();
      $premiumworkoutdetail = PremiumWorkoutDetails::where('id',$id)->with('premiumworkout','workoutcategory','workouttype')->first();


        
    	return view('admin.premiumworkoutdetails.edit',compact('page','sub_page','premiumworkoutdetail','workout_types','categories','premium_videos'));


    }


    public function update(Request $request,$id){

     $isalreadyexist = PremiumWorkoutDetails::where('id','!=',$id)->where('name',$request->name)->first();
     $name = PremiumVideos::where('id',$request->premium_workout_id)->first()->name;
    	if($isalreadyexist != null){
    	   return back()->with('status',100)->with('type','success')->with('message','Premium Workout Details already exist');	
    	}
         
            $imagePath = '';
         	if($request->hasFile('image')){
          
            $ext = $request->image->getClientOriginalExtension();


            $path = Storage::putFileAs('premiumimages', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;


            $data = [
        
        'name' => $name,
        'image' => $imagePath,
        'premium_workout_id'=>$request->premium_workout_id,
        'category_id'=>$request->category_id,
        'workout_type_id'=>$request->workout_type_id,
        'workout_level'=>$request->workout_level,
        'trainer_name'=>$request->trainer_name,
        'description'=>$request->description,
        'created_at'=> Carbon::now(),
       

    	];


    	PremiumWorkoutDetails::where('id',$id)->update($data);
        

        return back()->with('status',100)->with('type','success')->with('message','Premium Workout Details updated successfully');

                  }



    	$data = [
        
        'name' => $name,
        
        'premium_workout_id'=>$request->premium_workout_id,
        'category_id'=>$request->category_id,
        'workout_type_id'=>$request->workout_type_id,
        'workout_level'=>$request->workout_level,
        'trainer_name'=>$request->trainer_name,
        'description'=>$request->description,
        'created_at'=> Carbon::now(),
       

    	];


    	PremiumWorkoutDetails::where('id',$id)->update($data); 
        

        return back()->with('status',100)->with('type','success')->with('message','Premium Workout Details updated successfully');

    }


    public function delete($id){

     PremiumWorkoutDetails::where('id', $id)->delete();
     return back()->with('status',100)->with('type','success')->with('message','Language   deleted Successfully');



    }
}
