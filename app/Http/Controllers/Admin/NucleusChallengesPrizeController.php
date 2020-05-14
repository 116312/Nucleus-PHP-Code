<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\NucleusChallengesPrize;
use App\Model\NucleusChallenges;
use Storage;
use Response;


class NucleusChallengesPrizeController extends Controller
{

   





    public function add($challenge_id){


    	 $page = 'nucleus-challenges';

    	$subpage = 'show-nuc-chall';

    	

        return view('admin.nucleuschallengeprize.add',compact('page','subpage','challenge_id'));
    }

    public function store($challenge_id,Request $request){

         $imagePath = "";

           if($request->hasFile('image'))
           {
          
            $ext = $request->image->getClientOriginalExtension();
            $path = Storage::putFileAs('challengesprize', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;

                  }
     

        $data = [
       
       'nucleus_challenge_id' => $challenge_id,

       'title' =>$request->title,
       'description'=>$request->description,
       'image' =>$imagePath,
       'created_at'=>Carbon::now(),


        ];



        NucleusChallengesPrize::insert($data);
       
       $levels = NucleusChallengesPrize::where('nucleus_challenge_id',$challenge_id)->get();

       $no_of_level = $levels->count();

       $challenge = [
       'prize_level'=> $no_of_level,

       ];

       NucleusChallenges::find($challenge_id)->update($challenge);
        

      return back()->with('status',100)->with('type','success')->with('message','Prize added successfully');


      }



      public function show($challenge_id){

        $page = 'nucleus-challenges';

    	$subpage = 'show-nuc-chall';

    	$prizes = NucleusChallengesPrize::where('nucleus_challenge_id',$challenge_id)->get();

       return view('admin.nucleuschallengeprize.show',compact('page','subpage','challenge_id','prizes'));


      }





      public function edit($challenge_id,$id){

     $page = 'nucleus-challenges';

    	$subpage = 'show-nuc-chall';

    	$prize = NucleusChallengesPrize::find($id);

       return view('admin.nucleuschallengeprize.edit',compact('page','subpage','challenge_id','prize'));

      }



      public function update($challenge_id,$id,Request $request){
       
         $imagePath = "";

           if($request->hasFile('image'))
           {
          
            $ext = $request->image->getClientOriginalExtension();
            $path = Storage::putFileAs('challengesprize', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;

              NucleusChallengesPrize::where('id',$id)->update(['image'=>$imagePath]);

             }
     

        $data = [
       
       'nucleus_challenge_id' => $challenge_id,

       'title' =>$request->title,
       'description'=>$request->description,
     
       'updated_at'=>Carbon::now(),


        ];



        NucleusChallengesPrize::where('id',$id)->update($data);
        return back()->with('status',100)->with('type','success')->with('message','Prize updated successfully');


      }





       public function delete($challenge_id,$id){

       NucleusChallengesPrize::where('id', $id)->delete();
         
       $levels = NucleusChallengesPrize::where('nucleus_challenge_id',$challenge_id)->get();

       $no_of_level = $levels->count();

       $challenge = [
       'prize_level'=> $no_of_level,

       ];

       NucleusChallenges::find($challenge_id)->update($challenge);

        return back()->with('status',100)->with('type','success')->with('message','Nucleus Challenge deleted Successfully');
  
}



}
