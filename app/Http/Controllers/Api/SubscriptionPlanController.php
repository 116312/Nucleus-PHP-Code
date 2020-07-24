<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PremiumVideos;
use Response;
class SubscriptionPlanController extends Controller
{
   



   public function getSubscriptionPlan(Request $request){

 $subscriptionPlan = PremiumVideos::where('id',$request->video_id)->with(['premiumworkoutdetails.workoutcategory.subscribedworkoutcategory.subscriptioncategory','premiumworkoutdetails.workoutcategory.subscribedworkoutcategory.subscriptionworkoutplan.subscriptionplan','premiumworkoutdetails.workoutcategory.subscribedworkoutcategory.subscriptionworkoutplan.subscriptionbenifits','premiumworkoutdetails.workoutcategory.subscribedworkoutcategory.subscriptionworkoutplan.subscriptiondetails'])->get();
       return Response::json(['code' => 200,'status' => true, 'message' => 'Subscription Plan Of Premium Video','data'=>$subscriptionPlan]);

   }


   








}
