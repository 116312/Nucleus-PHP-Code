<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\FemaleCategoryImage;
use App\Model\MaleCategoryImage;
use App\Model\UnspecifiedCategoryImage;
use Storage;
use Carbon\Carbon;
class CategoryController extends Controller
{
   
   public function add(){

   $page = 'workout-cate';

   $sub_page ='add-cate';


   return view('admin.workoutcategory.add',compact('page','sub_page'));

   }


   public function store(Request $request){

    $isSequencealreadyexisted = Category::where('sequence_no',$request->sequence_number)->first();
  

    if($isSequencealreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','Sequence Number already existed');

    }

    $iscategorynamealreadyexisted = Category::where('name',$request->name)->first();



    if($iscategorynamealreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','Workout Category Already  existed');

    }





    $maleimagePath = '';
    $femaleimagePath ='';
    $unspecifiedimagePath ='';

     $imagePath = "";

           if($request->hasFile('female_image')){
          
            $ext = $request->female_image->getClientOriginalExtension();
            $path = Storage::putFileAs('category', $request->female_image,time().uniqid().".".$ext);

            $femaleimagePath = $path;

                  }


             if($request->hasFile('male_image')){

            $ext = $request->male_image->getClientOriginalExtension();
            $path = Storage::putFileAs('category', $request->male_image,time().uniqid().".".$ext);

            $maleimagePath = $path;

                  }

             if($request->hasFile('unspecified_image')){

            $ext = $request->unspecified_image->getClientOriginalExtension();
            $path = Storage::putFileAs('category', $request->unspecified_image,time().uniqid().".".$ext);

            $unspecifiedimagePath = $path;

                  }




   	$data = [

   'sequence_no' => $request->sequence_number,
   'name'    => $request->name,
   'created_at' =>Carbon::now()



   	];


     $id = Category::insertGetId($data);
     MaleCategoryImage::insert(['category_id' => $id,'image' => $maleimagePath,'created_at' =>Carbon::now()]);
     FemaleCategoryImage::insert(['category_id' => $id,'image' => $femaleimagePath,'created_at' =>Carbon::now()]);
     UnspecifiedCategoryImage::insert(['category_id' => $id,'image' => $unspecifiedimagePath,'created_at' =>Carbon::now()]);

          return back()->with('status',100)->with('type','success')->with('message','Workout Category added Successfully');


    }



    public function show(){
      
       $page = 'workout-cate';

       $sub_page ='show-cate';

       $categories = Category::with('femalecategoryimage','malecategoryimage','unspecifiedcategoryimage')->get();


       return view('admin.workoutcategory.show',compact('page','sub_page','categories'));

    }


    public function edit($id){

     $page = 'workout-cate';

       $sub_page ='show-cate';

       $category = Category::where('id',$id)->with('femalecategoryimage','malecategoryimage','unspecifiedcategoryimage')->first();


       return view('admin.workoutcategory.edit',compact('page','sub_page','category'));

    }




    public function update(Request $request, $id){


    $maleimagePath = '';
    $femaleimagePath ='';
    $unspecifiedimagePath ='';

     $isSequencealreadyexisted = Category::where('id','!=',$id)->where('sequence_no',$request->sequence_number)->first();
  

    if($isSequencealreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','Sequence Number already existed');

    }

    $iscategorynamealreadyexisted = Category::where('id','!=',$id)->where('name',$request->name)->first();



    if($iscategorynamealreadyexisted != null){
         
         return back()->with('status',100)->with('type','danger')->with('message','Workout Category Already  existed');

    }





    

  
          




   	$data = [

   'sequence_no' => $request->sequence_number,
   'name'    => $request->name,
   'updated_at' =>Carbon::now()



   	];


    Category::where('id',$id)->update($data);


      if($request->hasFile('female_image')){
          
            $ext = $request->female_image->getClientOriginalExtension();
            $path = Storage::putFileAs('category', $request->female_image,time().uniqid().".".$ext);

            $femaleimagePath = $path;
             MaleCategoryImage::where('category_id',$id)->update(['image' => $femaleimagePath,'updated_at' =>Carbon::now()]);

                  }


             if($request->hasFile('male_image')){

            $ext = $request->male_image->getClientOriginalExtension();
            $path = Storage::putFileAs('category', $request->male_image,time().uniqid().".".$ext);

            $maleimagePath = $path;
            FemaleCategoryImage::where('category_id',$id)->update(['image' => $maleimagePath,'updated_at' =>Carbon::now()]);

                  }

             if($request->hasFile('unspecified_image')){

            $ext = $request->unspecified_image->getClientOriginalExtension();
            $path = Storage::putFileAs('category', $request->unspecified_image,time().uniqid().".".$ext);

            $unspecifiedimagePath = $path;
            UnspecifiedCategoryImage::where('category_id',$id)->update(['image' => $unspecifiedimagePath,'updated_at' =>Carbon::now()]);

                  }
    
    
     

          return back()->with('status',100)->with('type','success')->with('message','Workout Category updated Successfully');


    }

   

   public function delete($id){

       Category::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Workout Category deleted Successfully');
  
}


}
