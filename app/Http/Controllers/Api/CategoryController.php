<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Response;
use App\User;

class CategoryController extends Controller
{
   
   public function getallcatgory(Request $request){

       $user = User::where('id',$request->user_id)->first();


       if($user->gender == null){
  
          
          $categories = Category::orderBy('sequence_no', 'asc')->with('unspecifiedcategoryimage')->get();

        }



      if($user->gender == 'Female'){
             
         $categories = Category::orderBy('sequence_no', 'asc')->with('femalecategoryimage')->get();

      }



      if($user->gender == 'Male'){

          $categories = Category::orderBy('sequence_no', 'asc')->with('malecategoryimage')->get();

      }
      $categories = Category::orderBy('sequence_no', 'asc')->with('unspecifiedcategoryimage')->get();
    
      return Response::json(['code' => 200,'status' => true, 'message' => 'All categories','data'=>$categories]);

   }


   public function getallcatgoryexceptallworkout(Request $request){


 $user = User::where('id',$request->user_id)->first();


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

}
