<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\SubscriptionCategory;
use App\Model\SubscriptionPlan;
use App\Model\SubscriptionPlanDetails;
use App\Model\AdditionalBenifits;
class SubscriptionPlanDetailsController extends Controller
{
    public function add(){
    
    	$page = 'subscription-plan-details';
        $sub_page = 'add-subscription-plan-details';
        $subscription_category = SubscriptionCategory::all();
        $subscription_plan = SubscriptionPlan::all();   

    	return view('admin.subscriptionplandetails.add',compact('page','sub_page','subscription_category','subscription_plan'));
    }



    public function store(Request $request){
         
          $per_month = $request->original_price * $request->offer_percentage;
          $plan_duration_price = $per_month * $request->number_of_month;

         $data = [
         
          'subscription_category_id'=>$request->subscription_category_id,
          'subscription_plan_id'=>$request->subscription_plan_id,
          'original_price' => $request->original_price,
          'offer_percentage'=>$request->offer_percentage,
          'number_of_month'=>$request->number_of_month,
          'per_month_price'=>$per_month,
          'plan_duration_price'=> $plan_duration_price,
          'created_at'=>Carbon::now(),

         ];


        $sub_id= SubscriptionPlanDetails::insertGetId($data);


         foreach($request->benifits as $benifits){
     $benifit = [];
      $benifit = [
     'subscription_plan_details_id' =>$sub_id,
     'benifits' => $benifits,
     'created_at'=> Carbon::now(),
      ];


      AdditionalBenifits::insert($benifit);

      }

         return back()->with('status',100)->with('type','succes')->with('message','Subscription Plan Details Saved Successfully');

    }



    public function show(){
     $page = 'subscription-plan-details';
     $sub_page = 'show-subscription-plan-details';
     $subscriptionplandetails = SubscriptionPlanDetails::with(['subscriptioncategory','subscriptionplan','additionalbenifits'])->get();
    
     return view('admin.subscriptionplandetails.show',compact('page','sub_page','subscriptionplandetails')); 
    }

    public function delete($id){

       SubscriptionPlanDetails::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Subscription Plan Details Successfully');
  
}









}
