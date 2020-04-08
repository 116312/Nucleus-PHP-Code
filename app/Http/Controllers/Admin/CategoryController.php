<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\FemaleCategoryImage;
use App\Model\MaleCategoryImage;
use Storage;
use Carbon\Carbon;
class CategoryController extends Controller
{
   
   public function add(){

   $page = 'workout-cate';

   $sub_page ='add-cate';


   return view('admin.category.add',compact('page','sub_page'));

   }


   public function store(Request $request){



    $maleimagePath = '';
    $femaleimagePath ='';

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


   	$data = [

   'sequence_no' => $request->sequence_number,
   'name'    => $request->name,
   'created_at' =>Carbon::now()



   	];


     $id = Category::insertGetId($data);
     MaleCategoryImage::insert(['category_id' => $id,'image' => $maleimagePath,'created_at' =>Carbon::now()]);
     FemaleCategoryImage::insert(['category_id' => $id,'image' => $femaleimagePath,'created_at' =>Carbon::now()]);

        return back()->with('success','record sucessfully updated');


    }



    public function show(){
      
       $page = 'workout-cate';

       $sub_page ='show-cate';

       $categories = Category::with('femalecategoryimage','malecategoryimage')->get();


       return view('admin.category.show',compact('page','sub_page','categories'));

    }
}
