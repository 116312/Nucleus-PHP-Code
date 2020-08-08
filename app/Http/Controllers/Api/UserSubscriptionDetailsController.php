<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserSubscriptionDetails;
use Carbon\Carbon;
use App\Model\UserSubscriptionPlanDetails; 
use Response;

class UserSubscriptionDetailsController extends Controller
{



	public function saveDetails(Request $request){


      $savedata= [
     'user_id'=> $request->user_id,
     'payment_id'=> $request->payment_id,
     'transaction_id'=> $request->transaction_id,
     'amount'=> $request->amount,
     'product'=> $request->product,
      ];

      $id= UserSubscriptionDetails::insertGetId($savedata);


      $plandetails = [
      'subscription_category_id'=>$request->subscription_category_id,
      'subscription_plan_id'=>$request->subscription_plan_id,
        ];

   $x = UserSubscriptionPlanDetails::insertGetId($plandetails);


     $details = [

    'transaction' =>UserSubscriptionDetails::find($id),
    'subscription_plan'=>UserSubscriptionPlanDetails::find($x),
     ];



       return Response::json(['code' => 200,'status' => true, 'message' => 'All categories','data'=>$details]);

   }

}
