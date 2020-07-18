<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\SubscriptionPlan;

class SubscriptionPlanController extends Controller
{
    public function add(){

    	$page = 'subscription-plan';

    	$sub_page = 'add-subscription-plan';


    	return view('admin.subscriptionplan.add',compact('page','sub_page'));
    }


    public function store(Request $request){

    $isalreadyexist = SubscriptionPlan::where('name',$request->name)->first();
    
    if($isalreadyexist != null){

    	    return back()->with('status',100)->with('type','danger')->with('message','Subscription plan already Exist');
    } 

    	$data = [
        
        'name'=>$request->name ,
        'created_at' => Carbon::now(),

    	];


    	Subscriptionplan::insert($data);

        return back()->with('status',100)->with('type','success')->with('message','Subscription plan is saved successfully');

    }


    public function show(){


    	$page = 'subscription-plan';

    	$sub_page = 'show-subscription-plan';

      $subscriptionplan = SubscriptionPlan::all();

      return view('admin.subscriptionplan.show',compact('page','sub_page','subscriptionplan'));



    }




    public function edit($id){

        $page = 'subscription-plan';

    	$sub_page = 'show-subscription-plan';

        $subscriptionplan = SubscriptionPlan::find($id);

      return view('admin.subscriptionplan.edit',compact('page','sub_page','subscriptionplan'));

    }



    public function update(Request $request,$id){


       $isalreadyexist = SubscriptionPlan::where('name',$request->name)->where('id','!=',$id)->first();
    
    if($isalreadyexist != null){

    	    return back()->with('status',100)->with('type','danger')->with('message','Subscription plan already Exist');
    } 

    	$data = [
        
        'name'=>$request->name ,
        'created_at' => Carbon::now(),

    	];


    	Subscriptionplan::where('id',$id)->update($data);

        return back()->with('status',100)->with('type','success')->with('message','Subscription plan is updated successfully');

    }




    public function delete($id){

       SubscriptionPlan::where('id', $id)->delete();
       return back()->with('status',100)->with('type','success')->with('message','Workout plan deleted Successfully');
  
}

}
