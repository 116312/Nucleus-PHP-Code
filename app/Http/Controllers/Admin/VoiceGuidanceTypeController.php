<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\VoiceGuidanceType;
use Carbon\Carbon;

class VoiceGuidanceTypeController extends Controller
{
    public function add(){


    	$page = 'voice-guidance-type';
    	$subpage = 'add -voice-guidance-type';


    	return view('admin.voiceguidancetype.add',compact('page','subpage'));
    }



    public function store(Request $request){




    	 $isalreadyexisted = VoiceGuidanceType::where('name',$request->name)->first();

    	if($isalreadyexisted != null){

    		return back()->with('status',100)->with('type','success')->with('message','Voice Guidance Type already existed');
    	} 
      $data = [
     'name' =>$request->name,
     'created_at' =>Carbon::now(),
      ];



      VoiceGuidanceType::insert($data);


     return back()->with('status',100)->with('type','success')->with('message','Voice Guidance Type added successfully');
    }




    public function show(){

      
    	$page = 'voice-guidance-type';
    	$subpage = 'show-voice-guidance-type';

         $voice_guidance_types = VoiceGuidanceType::all();


       return view('admin.voiceguidancetype.show',compact('page','subpage','voice_guidance_types'));

    }


    public function edit($id){
    

        $page = 'voice-guidance-type';
    	$subpage = 'show -voice-guidance-type';

         $voice_guidance_type = VoiceGuidanceType::find($id);


       return view('admin.voiceguidancetype.edit',compact('page','subpage','voice_guidance_type'));


    }



    public function update(Request $request , $id){


    	 $isalreadyexisted = VoiceGuidanceType::where('id',$id)->where('name',$request->name)->first();

    	if($isalreadyexisted != null){

    		return back()->with('status',100)->with('type','success')->with('message','Voice Guidance Type already existed');
    	} 
      $data = [
     'name' =>$request->name,
     'updated_at' =>Carbon::now(),
      ];



      VoiceGuidanceType::where('id',$id)->update($data);


     return back()->with('status',100)->with('type','success')->with('message','Voice Guidance Type updated successfully');

    }




    public function delete($id){

       VoiceGuidanceType::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Voice Guidance Type deleted Successfully');
  
}

}
