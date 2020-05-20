<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\PremiumWorkoutDetails;
use App\User;
use Response;
class WorkoutController extends Controller
{
    public function getworkoutbycategory(Request $request){
      
      $detail = Category::find($request->cate_id);
       
        $user = User::where('id',$request->user_id)->first();

       if($detail->name == 'ALL WORKOUTS'){


               if($user->gender == null){
          
                  
                  $categories = Category::where('name','!=','ALL WORKOUTS')->orderBy('sequence_no', 'asc')->with('unspecifiedcategoryimage')->get();

                }



              if($user->gender == 'Female'){
                     
                 $categories = Category::where('name','!=','ALL WORKOUTS')->orderBy('sequence_no', 'asc')->with('femalecategoryimage')->get();

              }



              if($user->gender == 'Male'){

                  $categories = Category::where('name','!=','ALL WORKOUTS')->orderBy('sequence_no', 'asc')->with('malecategoryimage')->get();

              }
      


      $categories = Category::where('name','!=','ALL WORKOUTS')->orderBy('sequence_no', 'asc')->with('unspecifiedcategoryimage')->get();
    
      return Response::json(['code' => 200,'status' => true, 'message' => 'All categories','data'=>$categories]);

   }


   



   
   if($detail->type =='others'){

    
 return Response::json(['code' => 200,'status' => true, 'message' => 'Training Plans and Goals','data'=>'it is training plan']);
      

    }



    if($detail->type == 'workout'){

      $workouts = [];

      $premiumworkouts = PremiumWorkoutDetails::where('category_id',$request->cate_id)->with('premiumworkout','workoutcategory','workouttype')->get();

      $quickclipworkouts = 'not available';


      $workouts = [
'premiumworkouts' =>$premiumworkouts,
'quickclipworkouts'=>$quickclipworkouts,
        
      ];


      return Response::json(['code' => 200,'status' => true, 'message' => 'All Workouts','data'=>$workouts]);

    }


}
}
