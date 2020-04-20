<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ChallengeCategory;
use App\Model\NucleusChallenges;

use Storage;
use Response;
use Carbon\Carbon;

class NucleusChallengeController extends Controller
{
    public function add(){

    	$page = 'nucleus-challenges';

        $subapage = 'promo-category';

    	$subpage = 'add-nuc-chall';

    	$challenges_categories = ChallengeCategory::all();


    	return view('admin.nucleuschallenges.add',compact('page','subpage','challenges_categories'));

     }


    public function store(Request $request){

     
    $isalreadyexisted = NucleusChallenges::where('challenge_category_id',$request->challenge_category_id)->where('name',$request->name)->first();

    if($isalreadyexisted != null){

           return back()->with('status',100)->with('type','danger')->with('message','Nucleus Challenge already existed');

    }


     $imagePath = "";

           if($request->hasFile('image'))
           {
          
            $ext = $request->image->getClientOriginalExtension();
            $path = Storage::putFileAs('challenges', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;

                  }
     


     
    $data = [


    'challenge_category_id'  => $request->challenge_category_id,
    'name' => $request->name,
    'points' => $request->points,
    'description' => $request->description,
    'image'=> $imagePath ,
    'created_at' => Carbon::now(),

    ];


    NucleusChallenges::insert($data);

    
     return back()->with('status',100)->with('type','success')->with('message','Nucleus Challenge added Successfully');

    }


    public function show(){


        $page = 'nucleus-challenges';

    	$subpage = 'add-nuc-chall';

    	$nucleus_challenges = NucleusChallenges::with('challengecategory')->get();

        return view('admin.nucleuschallenges.show',compact('page','subpage','nucleus_challenges'));



    }



    public function edit($id){

    	$page = 'nucleus-challenges';

    	$subpage = 'add-nuc-chall';

	     $nucleus_challenge = NucleusChallenges::where('id',$id)->with('challengecategory')->first();
         $challenges_categories = ChallengeCategory::all();
	     
	     return view('admin.nucleuschallenges.edit',compact('page','subpage','nucleus_challenge','challenges_categories'));

    }



    public function update(Request $request , $id){

          $isalreadyexisted = NucleusChallenges::where('id','!=',$id)->where('challenge_category_id',$request->challenge_category_id)->where('name',$request->name)->first();

    if($isalreadyexisted != null){

           return back()->with('status',100)->with('type','danger')->with('message','Nucleus Challenge already existed');

    }


     $imagePath = "";

           if($request->hasFile('image'))
           {
          
            $ext = $request->image->getClientOriginalExtension();
            $path = Storage::putFileAs('challenges', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;

           NucleusChallenges::where('id',$id)->update(['image'=>$imagePath]);

                  }
     


     
    $data = [


    'challenge_category_id'  => $request->challenge_category_id,
    'name' => $request->name,
    'points' => $request->points,
    'description' => $request->description,
   
    'created_at' => Carbon::now(),

    ];


    NucleusChallenges::where('id',$id)->update($data);

    
     return back()->with('status',100)->with('type','success')->with('message','Nucleus Challenge updated Successfully');
  
       


    }



     public function delete($id){

       NucleusChallenges::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Nucleus Challenge deleted Successfully');
  
}



}
