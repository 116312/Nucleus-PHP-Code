<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Model\NucleusChallenges;
use App\Model\UserNucleusChallenge;
use Carbon\Carbon;

class NucleusChallengeController extends Controller
{
    public function getallchallenges(){

   $nucleuschallenge = NucleusChallenges::with('challengecategory')->with('nucleuschallengeprize')->get();


      return Response::json(['code' => 200,'status' => true, 'message' => 'All nucleus challenges','data'=>$nucleuschallenge]);
      

    }



    public function userselectchallenge(Request $request){
    	$isalraedyexist = UserNucleusChallenge::where('user_id',$request->user_id)->first();
    	if($isalraedyexist != null){

    		 return Response::json(['code' => 200,'status' => true, 'message' => 'User already selected the nucleus challenge','data'=>$isalraedyexist]);
    	}

      $data = [
       'user_id'=>$request->user_id,
       'nucleus_challenge_id'=>$request->challenge_id,
       'created_at'=>Carbon::now(),
      ];
      
     UserNucleusChallenge::insert($data);

 return Response::json(['code' => 200,'status' => true, 'message' => 'User  select the nucleus challenges','data'=>$data]);
      

    }
}
