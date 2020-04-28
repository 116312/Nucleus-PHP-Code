<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Gif;
use Storage;

class GifController extends Controller
{
    public function add(){

     $page = 'gif';
     $sub_page = 'add-gif';



     return view('admin.gif.add',compact('page','sub_page'));
    


    }



    public function store(Request $request){


    	
    $isalreadyexisted = Gif::where('name',$request->name)->first();
  

    if($isalreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','Gif Name already existed');

    }


         $filepath = '';
    	 if($request->hasFile('gif')){
          
            $ext = $request->gif->getClientOriginalExtension();
            $path = Storage::putFileAs('gifs', $request->gif,time().uniqid().".".$ext);

            $filepath = $path;

                  }


    	$data = [

        'name' => $request->name,
        'gif' =>$filepath,
        'created_at'=>Carbon::now(),

    	];
       

       Gif::insert($data);

       return back()->with('status',100)->with('type','success')->with('message','Gif added successfully');



    }



    public function show(){

         $page = 'gif';
        $sub_page = 'show-gif';

       $gifs = Gif::all();

     return view('admin.gif.show',compact('page','sub_page','gifs'));
    

    }



    public function edit($id){

      $page = 'gif';
      $sub_page = 'show-gif';
      $gif = Gif::find($id);

     return view('admin.gif.edit',compact('page','sub_page','gif'));

    }



    public function update(Request $request, $id){


       $isalreadyexisted = Gif::where('id','!=',$id)->where('name',$request->name)->first();
  

    if($isalreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','Gif Name already existed');

    }


         $filepath = '';
    	 if($request->hasFile('gif')){
          
            $ext = $request->gif->getClientOriginalExtension();
            $path = Storage::putFileAs('gifs', $request->gif,time().uniqid().".".$ext);

            $filepath = $path;
              Gif::where('id',$id)->update(['gif' => $filepath,'updated_at' =>Carbon::now()]);

                  }


    	$data = [

        'name' => $request->name,
       
        'updated_at'=>Carbon::now(),

    	];
       

       Gif::find($id)->update($data);

       return back()->with('status',100)->with('type','success')->with('message','Gif updated successfully');
    }


    public function delete($id){


    	Gif::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Gif deleted Successfully');
    }
}
