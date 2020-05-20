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

        $premiumworkoutdetails = PremiumWorkoutDetails::with('premiumworkout','workoutcategory','workouttype')->get();

dd($premiumworkoutdetails);
        
    	return view('admin.premiumworkoutdetails.show',compact('page','sub_page','premiumworkoutdetails'));


    }
}
