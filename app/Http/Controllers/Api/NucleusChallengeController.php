<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Model\NucleusChallenges;

class NucleusChallengeController extends Controller
{
    public function getallchallenges(){

   $nucleuschallenge = NucleusChallenges::with('challengecategory')->with('nucleuschallengeprize')->get();


      return Response::json(['code' => 200,'status' => true, 'message' => 'All nucleus challenges','data'=>$nucleuschallenge]);
      

    }
}
