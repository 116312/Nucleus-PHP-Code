<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\SubscriptionCategory;
use App\Model\SubscriptionPlan;
use App\Model\SubscriptionPlanDetails;
use App\Model\AdditionalBenifits;


class AssignSubscriptionController extends Controller
{
	
     /**
     *assignSubscription (This function use for Load AssignSubscription page and fetch all subscription and also get susbscription plan)
     *
     * @param:-userId  {init} 
     *
     * @return JSON
     */
    public function assignSubscription($userId)
    {
        $subscription_category = SubscriptionCategory::all();
        $subscription_plan = SubscriptionPlan::all();
        return view('admin.assignSubscription.assign-subscription',compact('subscription_category','subscription_plan'));
    }
}
