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



}
