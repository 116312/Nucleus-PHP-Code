<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\QuickClips;
use Storage;
use Response;
use Carbon\Carbon;

class QuickClipsController extends Controller
{
    public function add(){
    
      $page = 'quick-clips';
     $sub_page = 'add-quick-clips';



     return view('admin.quickclips.add',compact('page','sub_page'));

    }



    public function store(Request $request){
      
      $isalreadyexisted = QuickClips::where('name',$request->name)->first();
  

    if($isalreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','QuickClips Name already existed');

    }


         $filepath = '';
         $imagePath = '';
    	 if($request->hasFile('clip')){
          
            $ext = $request->clip->getClientOriginalExtension();
            $path = Storage::putFileAs('QuickClips', $request->clip,time().uniqid().".".$ext);

            $filepath = $path;

                  }
         if($request->hasFile('image')){
          
            $ext = $request->image->getClientOriginalExtension();
            $image_path = Storage::putFileAs('QuickClipimages', $request->image,time().uniqid().".".$ext);

            $imagePath = $image_path;

                  }


    	$data = [

        'name' => $request->name,
        'clip' => $filepath,
        'image'=> $imagePath,
        'created_at'=>Carbon::now(),

    	];
       

       QuickClips::insert($data);

       return back()->with('status',100)->with('type','success')->with('message','QuickClips added successfully');


    }



    public function show(){

      $page = 'quick-clips';
     $sub_page = 'show-quick-clips';
     
     $clips = QuickClips::all();
      return view('admin.quickclips.show',compact('page','sub_page','clips'));
    }


    public function edit($id){
      
      $page = 'quick-clips';
      $sub_page = 'show-quick-clips';
     
     $clip = QuickClips::find($id);
      return view('admin.quickclips.edit',compact('page','sub_page','clip'));


    }



    public function update($id, Request $request){
      

     $isalreadyexisted = QuickClips::where('id','!=',$id)->where('name',$request->name)->first();
  

    if($isalreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','QuickClips Name already existed');

    }


        
    	 if($request->hasFile('clip')){
          
            $ext = $request->clip->getClientOriginalExtension();
            $path = Storage::putFileAs('QuickClips', $request->clip,time().uniqid().".".$ext);

            $filepath = $path;
         

       QuickClips::where('id',$id)->update(['clip'=>$filepath]);
      


                  }


        if($request->hasFile('image')){
          
            $ext = $request->image->getClientOriginalExtension();
            $image_path = Storage::putFileAs('QuickClipimages', $request->image,time().uniqid().".".$ext);

            $imagePath = $image_path;


             QuickClips::where('id',$id)->update(['image'=>$imagePath]);

                  }


    	$data = [

        'name' => $request->name,
        
        'updated_at'=>Carbon::now(),

    	];
       

       QuickClips::where('id',$id)->update($data);

       return back()->with('status',100)->with('type','success')->with('message','QuickClips updated successfully');



    }

    public function delete($id){


    	QuickClips::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','QuickClips deleted Successfully');
    }
}
