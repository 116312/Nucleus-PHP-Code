<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\PromotionManagement;
use App\Model\PromotionFiles;
use App\Model\PromotionWorkoutCategory;
use App\Model\NucleusChallenges;
use App\Model\PromotionNucleusChallenge;
use Response;
use Storage;
use Carbon\Carbon;
use App\Model\PromotionalVideos;


class PromotionManagementController extends Controller
{
   
     

     public function addCategory(){

       $page = 'promo-management';

       $subapage = 'promo-category';

       $subpage = 'add-promo';


       $categories = Category::all();

       return view('admin.promotionmanagement.add-category',compact('page','subpage','categories'));

     }





     public function addChallenge(){
       
        $page = 'promo-management';

        $subapage = 'promo-challenge';

        $subpage  = 'add-promo-chall';


       $challenges = NucleusChallenges::with('challengecategory')->get();

       

       return view('admin.promotionmanagement.add-challenge',compact('page','subpage','challenges'));

        

     }




     public function addVideo(){
       
        $page = 'promo-management';

        $subapage = 'promo-video';

        $subpage  = 'add-promo-video';


       $challenges = NucleusChallenges::with('challengecategory')->get();

       return view('admin.promotionmanagement.add-video',compact('page','subpage','challenges'));
         




     }




     public function store(Request $request){



     
       $promomanagedata = [
        
        'promo_type'=> $request->promo_type,
        'status'=>0 ,
        'created_at' =>Carbon::now(),
        
       ];


       $promo_id = PromotionManagement::insertGetId($promomanagedata);
        
       $filePath = "";

           if($request->hasFile('promo_file')){
          
            $ext = $request->promo_file->getClientOriginalExtension();
            $path = Storage::putFileAs('promotionfiles', $request->promo_file,time().uniqid().".".$ext);

            $filePath = $path;
    

                  }

           $promofile = [
         
           'promo_id' => $promo_id,
           'file' => $filePath,
           'created_at' =>Carbon::now(),

           ];

           PromotionFiles::insert($promofile);


       $video = '';
       if($request->promo_type == 'video'){


           if($request->hasFile('video')){
          
            $ext = $request->video->getClientOriginalExtension();
            $path = Storage::putFileAs('promotionalvideos', $request->video,time().uniqid().".".$ext);

            $video = $path;
    

                  }

          


          $promovideo = [
           
           'promo_id' => $promo_id,
           'video' => $video,
           'dacast_link'=> $request->dacast_link,
           'applicable_for_app'=>$request->applicable_for_app,
           'content_id'=>$request->content_id,
           'created_at'=>Carbon::now(),
 
 
           ];


           PromotionalVideos::insert($promovideo);

        return back()->with('status',100)->with('type','success')->with('message','Video is added Successfully for Promotion');

       }





       // Promotional Category

       if($request->promo_type == 'category'){
     
 
           $promocate = [
           
           'promo_id' => $promo_id,
           'category_id' => $request->category_id,
           'created_at'=>Carbon::now(),
 
           ];

            PromotionWorkoutCategory::insert($promocate);


        return back()->with('status',100)->with('type','success')->with('message','Category is added Successfully for Promotion');

       }



         if($request->promo_type == 'challenge'){
     
 
           $promocate = [
           
           'promo_id' => $promo_id,
           'nucleus_challenge_id' => $request->challenge_id,
           'created_at'=>Carbon::now(),
 
           ];

            PromotionNucleusChallenge::insert($promocate);


        return back()->with('status',100)->with('type','success')->with('message','Challenge is added Successfully for Promotion');

       }



    




}

       public function showCategory(){
       
         $page = 'promo-management';

         $subapage = 'promo-challenge';

         $subpage = 'show-promo';
         
         $cate_promotion = PromotionManagement::where('promo_type','category')->with('promocategory.category','promofiles')->get();

         return view('admin.promotionmanagement.show-category',compact('page','subpage','cate_promotion'));


       }



       public function showchallenge(){

          $page = 'promo-management';

          $subapage = 'promo-category';
 
          $subpage = 'show-promo';


          $chall_promotion = PromotionManagement::where('promo_type','challenge')->with('promochallenges.nucleuschallenge.challengecategory','promofiles')->get();


           return view('admin.promotionmanagement.show-challenge',compact('page','subpage','chall_promotion'));


       }



       public function showVideo(){
         
         $page = 'promo-management';

          $subapage = 'promo-category';
 
          $subpage = 'show-promo';


          $video_promotion = PromotionManagement::where('promo_type','video')->with('promofiles','promovideo')->get();

        
          return view('admin.promotionmanagement.show-video',compact('page','subpage','video_promotion'));



       }





       public function editCategory($id){


          $page = 'promo-management';

          $subapage = 'promo-category';

          $subpage = 'show-promo';

          $categories = Category::all();

          $cate_promotion = PromotionManagement::where('id',$id)->with('promocategory.category','promofiles')->first();

          return view('admin.promotionmanagement.edit-category',compact('page','subpage','categories','cate_promotion'));


       }





       public function editChallenge($id){

          $page = 'promo-management';

          $subapage = 'promo-category';

          $subpage = 'show-promo';

          $challenges = NucleusChallenges::with('challengecategory')->get();

          $chall_promotion = PromotionManagement::where('id',$id)->with('promochallenges.nucleuschallenge','promofiles')->first();

          return view('admin.promotionmanagement.edit-challenge',compact('page','subpage','challenges','chall_promotion'));


       }



       public function editVideo($id){

          

          $page = 'promo-management';

          $subapage = 'promo-video';

          $subpage = 'show-promo';

        
          $video_promotion = PromotionManagement::where('id',$id)->with('promofiles','promovideo')->first();

          return view('admin.promotionmanagement.edit-video',compact('page','subpage','video_promotion'));



       }





       public function update(Request $request ,$id){

        $promomanagedata = [
        
        'promo_type'=> $request->promo_type,
        'status'=>0 ,
        'updated_at' =>Carbon::now(),
        
       ];
        
        $promo_id = $id;

        PromotionManagement::where('id',$id)->update($promomanagedata);
        
         $filePath = "";

           if($request->hasFile('promo_file')){
          
            $ext = $request->promo_file->getClientOriginalExtension();
            $path = Storage::putFileAs('promotionfiles', $request->promo_file,time().uniqid().".".$ext);

            $filePath = $path;


             $promofile = [
         
           'promo_id' => $promo_id,
           'file' => $filePath,
           'updated_at' =>Carbon::now(),

           ];

           PromotionFiles::where('promo_id',$id)->update($promofile);

    

                  }


        $video = '';
       if($request->promo_type == 'video'){


           if($request->hasFile('video')){
          
            $ext = $request->video->getClientOriginalExtension();
            $path = Storage::putFileAs('promotionalvideos', $request->video,time().uniqid().".".$ext);

            $video = $path;


              $promovideo = [
           
           'promo_id' => $promo_id,
           'video' => $video,
           'dacast_link'=> $request->dacast_link,
           'applicable_for_app'=>$request->applicable_for_app,
           'content_id'=>$request->content_id,
           'created_at'=>Carbon::now(),
 
 
           ];


           PromotionalVideos::where('promo_id',$id)->update($promovideo);
    

                  }

          


          $promovideo = [
           
           'promo_id' => $promo_id,
          
           'dacast_link'=> $request->dacast_link,
           'applicable_for_app'=>$request->applicable_for_app,
           'content_id'=>$request->content_id,
           'created_at'=>Carbon::now(),
 
 
           ];


           PromotionalVideos::where('promo_id',$id)->update($promovideo);

          
       

       if($request->promo_type == 'category'){
     
 
           $promocate = [
           
           'promo_id' => $promo_id,
           'category_id' => $request->category_id,
           'updated_at' =>Carbon::now(),
 
           ];

            PromotionWorkoutCategory::where('promo_id',$id)->update($promocate);


        return back()->with('status',100)->with('type','success')->with('message','Category is Updated Successfully for Promotion');




       }



      if($request->promo_type == 'challenge'){
     
 
           $promocate = [
           
           'promo_id' => $promo_id,
           'nucleus_challenge_id' => $request->challenge_id,
           'updated_at'=>Carbon::now(),
 
           ];

            PromotionNucleusChallenge::where('promo_id',$id)->update($promocate);


        return back()->with('status',100)->with('type','success')->with('message','Challenge is update Successfully for Promotion');

       }



    


       return back()->with('status',100)->with('type','success')->with('message','Video is updated Successfully for Promotion');
     	
     

}


  }


    public function delete($id){

     PromotionManagement::where('id', $id)->delete();
     return back()->with('status',100)->with('type','success')->with('message','promotion deleted Successfully');



    }



    public function dacastVideo($id){

     
     $video  = PromotionalVideos::where('promo_id',$id)->first()->dacast_link;

    return view('admin.dacast',compact('video'));

    }







}