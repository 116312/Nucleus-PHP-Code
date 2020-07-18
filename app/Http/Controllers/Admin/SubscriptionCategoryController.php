<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\SubscriptionCategory;

class SubscriptionCategoryController extends Controller
{
    public function add(){

    	$page = 'subscription-category';

    	$sub_page = 'add-subscription-category';


    	return view('admin.subscriptioncategory.add',compact('page','sub_page'));
    }


    public function store(Request $request){

    $isalreadyexist = SubscriptionCategory::where('name',$request->name)->first();
    
    if($isalreadyexist != null){

    	    return back()->with('status',100)->with('type','danger')->with('message','Subscription Category already Exist');
    } 

    	$data = [
        
        'name'=>$request->name ,
        'created_at' => Carbon::now(),

    	];


    	SubscriptionCategory::insert($data);

        return back()->with('status',100)->with('type','success')->with('message','Subscription Category is saved successfully');

    }


    public function show(){


    	$page = 'subscription-category';

    	$sub_page = 'show-subscription-category';

      $subscriptioncategory = SubscriptionCategory::all();

      return view('admin.subscriptioncategory.show',compact('page','sub_page','subscriptioncategory'));



    }




    public function edit($id){

        $page = 'subscription-category';

    	$sub_page = 'show-subscription-category';

        $subscriptioncategory = SubscriptionCategory::find($id);

      return view('admin.subscriptioncategory.edit',compact('page','sub_page','subscriptioncategory'));

    }



    public function update(Request $request,$id){


       $isalreadyexist = SubscriptionCategory::where('name',$request->name)->where('id','!=',$id)->first();
    
    if($isalreadyexist != null){

    	    return back()->with('status',100)->with('type','danger')->with('message','Subscription Category already Exist');
    } 

    	$data = [
        
        'name'=>$request->name ,
        'created_at' => Carbon::now(),

    	];


    	SubscriptionCategory::where('id',$id)->update($data);

        return back()->with('status',100)->with('type','success')->with('message','Subscription Category is updated successfully');

    }




    public function delete($id){

       SubscriptionCategory::where('id', $id)->delete();
       return back()->with('status',100)->with('type','success')->with('message','Workout Category deleted Successfully');
  
}

}
