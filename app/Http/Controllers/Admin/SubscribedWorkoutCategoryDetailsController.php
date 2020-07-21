<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SubscriptionPlan;
use App\Model\SubscriptionCategory;
use App\Model\SubscribedWorkoutCategory;
use App\Model\Category;
use Carbon\Carbon;
class SubscribedWorkoutCategoryDetailsController extends Controller
{
    public function add($sub_id){

    	$page     = 'subscription-workout-category';
        $sub_page = 'add-subscription-workout-category';
    	$subscribedcategory = SubscribedWorkoutCategory::with(['workoutcategory','subscriptionplan','subscriptioncategory'])->find($sub_id);
    	return view('admin.subscribedworkoutcategorydetails.add',compact('page','sub_page','subscribedcategory','sub_id'));

    }



    public function store(Request $request ,$sub_id){
      

      dd($request->all());


    }
}
