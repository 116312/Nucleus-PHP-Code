<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\QuickClipWorkoutDetails;
use Storage;
use Carbon\Carbon;

class QuickClipWorkoutDetailsController extends Controller
{
    

   public function add(){
     
    $page = 'quick-clip-workout-details';

    $subpage = 'add-quick-clip-workout-details';


    return view('admin.quickclipworkoutdetails.add',compact('page','subpage'));

   }
   public function store(Request $request){


    	$isalreadyexist = QuickClipWorkoutDetails::where('name',$request->name)->first();

    	if($isalreadyexist != null){
    	   return back()->with('status',100)->with('type','success')->with('message','Quick Clip Workout Details already exist');	
    	}
         
            $imagePath = '';
         	if($request->hasFile('image')){
          
            $ext = $request->image->getClientOriginalExtension();


            $path = Storage::putFileAs('quickclipimages', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;

                  }



    	$data = [
        
        'name' => $request->name,
        'image' => $imagePath,
        'created_at'=> Carbon::now(),
       

    	];


    	QuickClipWorkoutDetails::insert($data);
        

        return back()->with('status',100)->with('type','success')->with('message','QuickClip Workout Details added successfully');



    }




    public function show(){
      
      	$page = 'premium-workout-details';

    	$sub_page = 'show-premium-workout-details';

        $quickclipworkoutdetails = QuickClipWorkoutDetails::all();
    	return view('admin.quickclipworkoutdetails.show',compact('page','sub_page','quickclipworkoutdetails'));


    }

}
