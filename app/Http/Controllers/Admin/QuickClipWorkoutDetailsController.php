<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\QuickClipWorkoutDetails;
use App\Model\Category;
use App\Model\QuickClips;
use App\Model\QuickClipWorkoutClip;
use Storage;

use Carbon\Carbon;

class QuickClipWorkoutDetailsController extends Controller
{
    

   public function add(){
     
    $page = 'quick_clip_workout_details';
    $sub_page = 'add_quick_clip_workout_details';
    $categories = Category::where('type','workout')->get();
    $quickclips = QuickClips::all();
   
    
    return view('admin.quickclipworkoutdetails.add',compact('page','sub_page','categories','quickclips'));

   }
   public function store(Request $request){

    	$isalreadyexist = QuickClipWorkoutDetails::where('name',$request->name)->first();

    	if($isalreadyexist != null){
    	   return back()->with('status',100)->with('type','success')->with('message','Quick Clip Workout Details already exist');	
    	}
         
            $imagePath = '';
            $clipPath ='';
         	if($request->hasFile('image')){
          
            $ext = $request->image->getClientOriginalExtension();


            $path = Storage::putFileAs('quickclipimages', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;

                  }

            if($request->hasFile('rest_clip')){
          
            $ext = $request->rest_clip->getClientOriginalExtension();


            $path = Storage::putFileAs('quickclip_rest_clips', $request->rest_clip,time().uniqid().".".$ext);

            $imagePath = $path;

                  }



    	$data = [
        'category_id'=>$request->category_id,
        'name' => $request->name,
        'image' => $imagePath,
        'description'=>$request->description,
        'rest_period'=>$request->rest_period,
        'rest_clip'=>$clipPath,
        'created_at'=> Carbon::now(),
       

    	];


    	$id = QuickClipWorkoutDetails::insertGetId($data);

        foreach($request->quick_clip_id as $clip){


            $clipdetails = [
            'quick_clip_workout_details_id'=>$id,
            'quick_clip_id'=>$clip,
            'created_at'=>Carbon::now(),


            ];


         QuickClipWorkoutClip::insert($clipdetails);
        
}
        return back()->with('status',100)->with('type','success')->with('message','QuickClip Workout Details added successfully');



    }




    public function show(){
      
      	$page = 'quick_clip_workout_details';

    	$sub_page = 'show_quick_clip_workout_details';

        $quickclipworkoutdetails = QuickClipWorkoutClip::with('quickclipworkoutdetails.workoutcategory','quickclips')->get();

   
    	return view('admin.quickclipworkoutdetails.show',compact('page','sub_page','quickclipworkoutdetails'));


    }

}
