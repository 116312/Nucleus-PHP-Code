<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ChallengeCategory;
use Carbon\Carbon;

class ChallengeCategoryController extends Controller
{
    

    public function add(){

      $page = 'challenges-cate';

      $subpage = 'add-chall-cate';



      return view('admin.challengecategory.add',compact('page','subpage'));
         
       

    }



    public function store(Request $request){


    	$alreadyexist = ChallengeCategory::where('name',$request->name)->first();

    	if($alreadyexist != null)
    	{

          
           return back()->with('status',100)->with('type','success')->with('message','Challenge Category already exist');
    	

    	}


        $data = [

        'name' => $request->name,
        'created_at' => Carbon::now(),
        ];
       


        ChallengeCategory::insert($data);

        return back()->with('status',100)->with('type','success')->with('message','Challenge Category added Successfully');



    }


    public function show(){


       $page = 'challenges-cate';

       $subpage = 'show-chall-cate';

       $challenges_categories = ChallengeCategory::all();
     
        return view('admin.challengecategory.show',compact('page','subpage','challenges_categories'));
    }




    public function edit($id){


    	  $page = 'challenges-cate';

         $subpage = 'show-chall-cate';


           $challenges_category = ChallengeCategory::find($id);


            return view('admin.challengecategory.edit',compact('page','subpage','challenges_category'));


    }




    public function update(Request $request,$id){

        $alreadyexist = ChallengeCategory::where('id','!=',$id)->where('name',$request->name)->first();

    	if($alreadyexist != null)
    	{

          
           return back()->with('status',100)->with('type','success')->with('message','Challenge Category already exist');
    	

    	}


        $data = [

        'name' => $request->name,
        'created_at' => Carbon::now(),
        ];
       


        ChallengeCategory::where('id',$id)->update($data);

        return back()->with('status',100)->with('type','success')->with('message','Challenge Category updated Successfully');

    }




     public function delete($id){

       ChallengeCategory::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Workout Category deleted Successfully');
  
}


}
