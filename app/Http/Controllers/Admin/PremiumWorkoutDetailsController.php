<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PremiumVideos;
use Carbon\Carbon;
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


    	return view('admin.premiumworkoutdetails.add',compact('page','sub_page'));
    }



    public function store(Request $request){


    	$isalreadyexist = PremiumWorkoutDetails::where('name',$request->name)->first();

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
        
        'name' => $request->name,
        'image' => $imagePath,
        'created_at'=> Carbon::now(),
       

    	];


    	PremiumWorkoutDetails::insert($data);
        

        return back()->with('status',100)->with('type','success')->with('message','Premium Workout Details added successfully');



    }




    public function show(){
      
      	$page = 'premium-workout-details';

    	$sub_page = 'show-premium-workout-details';

        $premiumworkoutdetails = PremiumWorkoutDetails::all();
    	return view('admin.premiumworkoutdetails.show',compact('page','sub_page','premiumworkoutdetails'));


    }
}
