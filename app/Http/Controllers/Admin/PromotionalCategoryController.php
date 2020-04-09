<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\PromotionalCategory;
use Carbon\Carbon;

class PromotionalCategoryController extends Controller
{
  


	   public function add(){

	   $page = 'promo-cate';

	   $sub_page ='add-promo';

	   $categories = Category::all();

	   return view('admin.promotionalcategory.add',compact('page','sub_page','categories'));

	   }






	   public function store(Request $request){
        


        
         
        foreach($request->category_id  as $key =>$cate){


        $isalreadyexist = PromotionalCategory::where('category_id',$cate)->first();


        if($isalreadyexist == null)

        	   {


        	   	$data = [
      
            'category_id' => $cate,
            'created_at' => Carbon::now(),

        	];


        	PromotionalCategory::insert($data);
        	   }

        	
        }


          return back()->with('status',100)->with('type','success')->with('message','Promotional Category added succesfully');




	   }




	   public function show(){

        $page = 'promo-cate';

	   $sub_page ='show-promo';



	   $promotionalcategories = PromotionalCategory::with('category')->get();

	   return view('admin.promotionalcategory.show',compact('page','sub_page','promotionalcategories'));


	   }


	   public function edit($id){
        
        $page = 'promo-cate';

	   $sub_page ='show-promo';

       
	   $promotionalcategory = PromotionalCategory::where('id',$id)->with('category')->first();
	     $categories = Category::all();

	   return view('admin.promotionalcategory.edit',compact('page','sub_page','promotionalcategory','categories'));

	   }



	   public function update(Request $request , $id){

      
        $isalreadyexist = PromotionalCategory::where('id','!=',$id)->where('category_id',$request->category_id)->first();

        if($isalreadyexist !=null){

          return back()->with('status',100)->with('type','success')->with('message','Promotional Category already existed');

        }

        	   


        	   	$data = [
      
            'category_id' => $request->category_id,
         
        	];

        


        	PromotionalCategory::where('id',$id)->update($data);
        	   

        	
      


          return back()->with('status',100)->with('type','success')->with('message','Promotional Category updated succesfully');



	   }



	    public function delete($id){

       PromotionalCategory::where('id', $id)->delete();
        return back()->with('status',100)->with('type','success')->with('message','Workout Category deleted Successfully');
  
}
}
