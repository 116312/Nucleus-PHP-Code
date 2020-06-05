<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Language;
use App\Model\VoiceGuidanceType;
use App\Model\QuickClipsDetails;
use Carbon\Carbon;
use Storage;

class QuickClipsDetailsController extends Controller
{
    public function add($clip_id){

        $page = 'quick-clips';
        $sub_page = 'show-quick-clips';

       $languages = Language::all();
       $voice_guidance_type = VoiceGuidanceType::all();


     return view('admin.quickclipsdetails.add',compact('page','sub_page','languages','voice_guidance_type','clip_id'));


    }



    public function store($clip_id,Request $request){

       
         $isalreadyexisted = QuickClipsDetails::where('quick_clip_id',$request->quick_clip_id)->where('voice_guidance_type_id',$request->voice_guidance_type_id)->where('language_id',$request->language_id)->first();
  

    if($isalreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','These Record already existed');

    }

         $audioPath = '';
         $subtitlePath = '';


           if($request->hasFile('audio')){
          
            $ext = $request->audio->getClientOriginalExtension();
            $path = Storage::putFileAs('QuickClipsAudio', $request->audio,time().uniqid().".".$ext);

            $audioPath = $path;

              }
               if($request->hasFile('subtitle')){
          
            $ext = $request->subtitle->getClientOriginalExtension();
            $path = Storage::putFileAs('QuickClipSubtitle', $request->subtitle,time().uniqid().".".$ext);

            $subtitlePath = $path;

              }

 
         $data = [

         'quick_clip_id'=>$clip_id,
         'voice_guidance_type_id'=>$request->voice_guidance_type_id,
         'language_id'=>$request->language_id,
         'audio'=>$audioPath,
         'subtitle'=>$subtitlePath,
         'created_at'=>Carbon::now(),  

         ];



        QuickClipsDetails::insert($data);

        return back()->with('status',100)->with('type','success')->with('message','QuickClips  Details added successfully');

    	
    }



    public function show($clip_id){
    
      $page = 'quick-clips';
      $sub_page = 'show-quick-clips';


     $quickclipdetails = QuickClipsDetails::where('quick_clip_id',$clip_id)->with(['quickclips','language','voiceguidancetype'])->get();

     
     dd($quickclipsdetails);
         

     return view('admin.quickclipsdetails.show',compact('page','sub_page','quickclipdetails','clip_id'));




    }



    public function edit($clip_id,$id){



  
      $page = 'quick-clips';
      $sub_page = 'show-quick-clips';


     $quickclipdetail = QuickClipsDetails::where('id',$id)->where('quick_clip_id',$clip_id)->with(['quickclips','language','voiceguidancetype'])->first();

      $languages = Language::all();
       $voice_guidance_type = VoiceGuidanceType::all();

         

     return view('admin.quickclipsdetails.edit',compact('page','sub_page','quickclipdetail','clip_id','languages','voice_guidance_type'));


    }



    public function update($clip_id,$id,Request $request){


   $isalreadyexisted = QuickClipsDetails::where('id','!=',$id)->where('quick_clip_id',$request->quick_clip_id)->where('voice_guidance_type_id',$request->voice_guidance_type_id)->where('language_id',$request->language_id)->first();
  

    if($isalreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','These Record already existed');

    }
         $audioPath = '';
         $subtitlePath = '';


           if($request->hasFile('audio')){
          
            $ext = $request->audio->getClientOriginalExtension();
            $path = Storage::putFileAs('QuickClipsAudio', $request->audio,time().uniqid().".".$ext);

            $audioPath = $path;
           QuickClipsDetails::where('id',$id)->update(['audio'=>$audioPath]);

            }
            if($request->hasFile('subtitle')){
          
            $ext = $request->subtitle->getClientOriginalExtension();
            $path = Storage::putFileAs('QuickClipSubtitle', $request->subtitle,time().uniqid().".".$ext);

            $subtitlePath = $path;
             QuickClipsDetails::where('id',$id)->update([ 'subtitle'=>$subtitlePath]);

              }

 
         $data = [

         'quick_clip_id'=>$clip_id,
         'voice_guidance_type_id'=>$request->voice_guidance_type_id,
         'language_id'=>$request->language_id,
         
        
         'updated_at'=>Carbon::now(),  

         ];



        QuickClipsDetails::where('id',$id)->update($data);

        return back()->with('status',100)->with('type','success')->with('message','QuickClips  Details updated successfully');
    }



     public function delete($id,$clip_id){

     QuickClipsDetails::where('id', $id)->delete();
     return back()->with('status',100)->with('type','success')->with('message','Record deleted Successfully');



    }
}
