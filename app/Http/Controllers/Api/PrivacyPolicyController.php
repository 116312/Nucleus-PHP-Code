<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PrivacyPolicy;
use Response;

class PrivacyPolicyController extends Controller
{
    public function getPrivacyPolicy(){
    	
       $policy = PrivacyPolicy::first();


           return view('api.privacy_policy',compact('policy'));


    }
}
