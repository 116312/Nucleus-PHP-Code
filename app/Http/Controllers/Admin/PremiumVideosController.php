<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use App\Model\Language;
use Carbon\Carbon;
use App\Model\PremiumVideos;

class PremiumVideosController extends Controller
{
    

    public function add(){


    	$page = 'premium-videos';
    	$sub_page = 'add-premium-videos';
      $languages = Language::all();
      
      return view('admin.premiumvideo.add',compact('page','sub_page','languages'));
    

    }




    public function store(Request $request){


    	
    $isalreadyexisted = PremiumVideos::where('name',$request->name)->first();
    
    if($request->active_for_app == 'dacast')
    {
      
      if($request->content_id == null){
          
           return back()->with('status',100)->with('type','danger')->with('message','content id is missing');

      }
           
        

    }


    if($request->active_for_app == 'uploaded video')
    {


       if($request->video == null)
       {

          return back()->with('status',100)->with('type','danger')->with('message','video is missing');

       }

       

    }
  

    if($isalreadyexisted != null)
    {
         
         return back()->with('status',100)->with('type','danger')->with('message','PremiumVideo Name already existed');

    }


         $filepath = '';
         $ext = '';
    	 if($request->hasFile('video')){
          
            $ext = $request->video->getClientOriginalExtension();


            $path = Storage::putFileAs('premiumvideos', $request->video,time().uniqid().".".$ext);

            $filepath = $path;

                  }


    	$data = [

        'name' => $request->name,
        'video' =>$filepath,
        'dacast_link'=>$request->dacast_link,
        'content_id'=>$request->content_id,
        'active_for_app'=>$request->active_for_app,
        'language'=>$request->language,
        'extension_type' =>$ext,
        'created_at'=>Carbon::now(),

    	];
       

       PremiumVideos::insert($data);

       return back()->with('status',100)->with('type','success')->with('message','Premium Video added successfully');



    }



    public function show(){

      	$page = 'premium-videos';
    	$sub_page = 'show-premium-videos';


       $premium_videos = PremiumVideos::all();

     return view('admin.premiumvideo.show',compact('page','sub_page','premium_videos'));
    

    }



    public function edit($id){

     	$page = 'premium-videos';
    	$sub_page = 'show-premium-videos';
      $video = PremiumVideos::find($id);
  $languages = Language::all();
     return view('admin.premiumvideo.edit',compact('page','sub_page','video','languages'));

    }



    public function update(Request $request, $id){


       $isalreadyexisted = PremiumVideos::where('id','!=',$id)->where('name',$request->name)->first();


         if($request->active_for_app == 'dacast')
    {
      
      if($request->content_id == null){
          
           return back()->with('status',100)->with('type','danger')->with('message','content id is missing');

      }
           
        

    }


    if($request->active_for_app == 'uploaded video')
    {


       if($request->video == null)
       {

          return back()->with('status',100)->with('type','danger')->with('message','video is missing');

      }
  
}
    if($isalreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','PremiumVideo Name already existed');

    }


         $filepath = '';
          $ext = '';
    	 if($request->hasFile('video')){
          
            $ext = $request->video->getClientOriginalExtension();
            $path = Storage::putFileAs('PremiumVideos', $request->video,time().uniqid().".".$ext);

            $filepath = $path;
              PremiumVideos::where('id',$id)->update(['video' => $filepath,'extension_type'=>$ext,'updated_at' =>Carbon::now()]);

                  }


    	$data = [

        'name' => $request->name,
        'language' =>$request->language,
        'dacast_link'=>$request->dacast_link,
        'content_id'=>$request->content_id,
        'active_for_app'=>$request->active_for_app,
        'updated_at'=>Carbon::now(),

    	];
       

       PremiumVideos::where('id',$id)->update($data);

       return back()->with('status',100)->with('type','success')->with('message','PremiumVideo updated successfully');
    }


    public function delete($id){


    	PremiumVideos::where('id', $id)->delete();
       return back()->with('status',100)->with('type','success')->with('message','PremiumVideo deleted Successfully');
    }




    public function dacastVideo($id){

     
     $video  = PremiumVideos::where('id',$id)->first()->dacast_link;

    return view('admin.dacast',compact('video'));

    }
}
