<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PremiumVideos;
use Response;
class SubscriptionPlanController extends Controller
{
   



   public function getSubscriptionPlan(Request $request){

       $subscriptionPlan = PremiumVideos::with(['premiumworkoutdetails.workoutcategory.subscribedworkoutcategory.subscriptioncategory','premiumworkoutdetails.workoutcategory.subscribedworkoutcategory.subscriptionplan','premiumworkoutdetails.workoutcategory.subscribedworkoutcategory.subscriptiondetails','premiumworkoutdetails.workoutcategory.subscribedworkoutcategory.subscriptionbenifits'])->get();

       return Response::json(['code' => 200,'status' => true, 'message' => 'Subscription Plan Of Premium Video','data'=>$subscriptionPlan]);

   }


   








}
