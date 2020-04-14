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



      if($user->gender == 'female'){
             
         $categories = Category::orderBy('sequence_no', 'asc')->with('femalecategoryimage')->get();

      }



      if($user->gender == 'male'){

          $categories = Category::orderBy('sequence_no', 'asc')->with('malecategoryimage')->get();

      }
    
    
      return Response::json(['code' => 200,'status' => true, 'message' => 'All categories','data'=>$categories]);

   }

}
