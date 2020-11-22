<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PrivacyPolicy;
use Carbon\Carbon;

class PrivacyPolicyController extends Controller
{
    public function add(){

       $page =  'privacy-policy';
       $sub_page = 'add-privacy-policy';
       

       return view('admin.privacypolicy.add',compact('page','sub_page'));

    }



    public function store(Request $request){


       
        $data = [
        
        'description' =>$request->description,
        'created_at' => Carbon::now(),
     
        ];
    	
        PrivacyPolicy::insert($data);

       return back()->with('status',100)->with('type','success')->with('message','Privacy Policy added successfully');

    }


    public function show(){

       $page     ='privacy-policy';
       $sub_page ='show-privacy-policy';


       $policy= PrivacyPolicy::first();

      

       return view('admin.privacypolicy.show',compact('page','sub_page','policy'));

    }


    public function edit($id){

       $page =  'privacy-policy';
       $sub_page = 'edit-privacy-policy';
       $policy = PrivacyPolicy::find($id);

       return view('admin.privacypolicy.edit',compact('page','sub_page','policy'));
    }


    public function delete($id){

       PrivacyPolicy::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','record deleted Successfully');
  
}


public function update(Request $request , $id){
  $data = [
        
        'description' =>$request->description,
        'created_at' => Carbon::now(),
     
        ];
      
        PrivacyPolicy::where('id',$id)->update($data);

       return back()->with('status',100)->with('type','success')->with('message','Record Updated Successfully');

}
}
