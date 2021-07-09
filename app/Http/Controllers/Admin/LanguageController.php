<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Language;
use Carbon\Carbon;

class LanguageController extends Controller
{
    public function add(){
      
       
       $page = 'language';

       $subpage = 'add-language';


      return view('admin.language.add',compact('page','subpage'));

    }



    public function store(Request $request){

        $isalreadyexisted = Language::where('name',$request->name)->first();

    	if($isalreadyexisted != null){

    		return back()->with('status',100)->with('type','success')->with('message','Language already existed');
    	} 


         $data = [

          'name' => $request->name,
          'created_at'=>Carbon::now(),
         ];


         Language::insert($data);

         return back()->with('status',100)->with('type','success')->with('message','Language added successfully');

    }



    public function show(){

       
       $page = 'language';

       $subpage = 'show-language';
       
       $languages = Language::all();

       return view('admin.language.show',compact('page','subpage','languages'));


    }



    public function edit($id){
       $page = 'language';

       $subpage = 'show-language';
       
       $language = Language::find($id);

       return view('admin.language.edit',compact('page','subpage','language'));


    }



    public function update(Request $request , $id){

        $isalreadyexisted = Language::where('id','!=',$id)->where('name',$request->name)->first();

    	if($isalreadyexisted != null){

    		return back()->with('status',100)->with('type','success')->with('message','Language already existed');
    	} 


         $data = [

          'name' => $request->name,
          'updated_at'=>Carbon::now(),
         ];


         Language::where('id',$id)->update($data);

         return back()->with('status',100)->with('type','success')->with('message','Language updated successfully');


    }



     public function delete($id){

     Language::where('id', $id)->delete();
     return back()->with('status',100)->with('type','success')->with('message','Language   deleted Successfully');



    }




}
