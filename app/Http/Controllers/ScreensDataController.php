<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PrivacyPolicy;
use Response;

class ScreensDataController extends Controller
{
    public function termsandconditions(){

    	  $policy = PrivacyPolicy::first();


           return view('terms_and_conditions',compact('policy'));
    }
}
