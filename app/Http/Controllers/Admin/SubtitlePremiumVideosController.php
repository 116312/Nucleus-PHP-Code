<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Language;
use App\Model\SubtitlePremiumVideo;
use Carbon\Carbon;
use App\Model\PremiumVideos;
use Storage;

class SubtitlePremiumVideosController extends Controller
{
    public function add($video_id){


    	$page = 'premium-videos';
    	$sub_page = 'add-premium-videos';
        $languages = Language::all();
      
      return view('admin.subtitlepremiumvideo.add',compact('page','sub_page','languages','video_id'));



    }


    public function store(Request $request ,$video_id){

          $isSequencealreadyexisted = SubtitlePremiumVideo::where('premium_video_id',$video_id)->where('language_id',$request->language_id)->first();
  

    if($isSequencealreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','Subtitle of the same language already existed');

    }
     

         $filepath = '';
         $ext = '';
    	 if($request->hasFile('subtitle')){
          
            $ext = $request->subtitle->getClientOriginalExtension();


            $path = Storage::putFileAs('subtitle', $request->subtitle,time().uniqid().".".$ext);

            $filepath = $path;

                  }


    	$data = [

        'premium_video_id' => $video_id,
        'language_id' =>$request->language_id,
        'subtitle'=>$filepath,
       
        'created_at'=>Carbon::now(),

    	];
       

       SubtitlePremiumVideo::insert($data);

          $subtitles = SubtitlePremiumVideo::where('premium_video_id',$video_id)->get();

       $subtitles_no = $subtitles->count();

       $total = [
       'total_subtitle'=> $subtitles_no,

       ];

       PremiumVideos::where('id',$video_id)->update($total);

       return back()->with('status',100)->with('type','success')->with('message','Subtitle of Premium Video added successfully');




    }


    public function show($video_id){
       
    	$page = 'premium-videos';
    	$sub_page = 'add-premium-videos';
       $video_subtitle = SubtitlePremiumVideo::where('premium_video_id',$video_id)->with('languages')->get();
       $video = PremiumVideos::where('id',$video_id)->first();
      
      return view('admin.subtitlepremiumvideo.show',compact('page','sub_page','video_id','video_subtitle','video'));


    }
}
