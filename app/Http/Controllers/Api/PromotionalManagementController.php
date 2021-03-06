<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PromotionManagement;
use App\Model\PromotionWorkoutCategory;
use Response;
use App\Model\PremiumVideos;

class PromotionalManagementController extends Controller
{
    public function getallpromotions(){

        $data = [];
       

    
        $combinepromotions = PromotionManagement::all();



        foreach($combinepromotions as $key => $promo)
        { 
           if($promo->promo_type == 'category'){

               $data[$key] = PromotionManagement::where('id',$promo->id)->with('promocategory.category.unspecifiedcategoryimage','promofiles')->first();

           }

           if($promo->promo_type == 'challenge'){
         
               $data[$key]= PromotionManagement::where('id', $promo->id)->with('promochallenges.nucleuschallenge','promofiles')->first();
           }

           if($promo->promo_type == 'video'){

                 $data[$key] = PromotionManagement::where('id',$promo->id)->with('promofiles','promovideo')->first();

           }

            


        }

      
       

         return Response::json(['code' => 200,'status' => true, 'message' => 'All Promotions','data'=>$data]);


    }



    public function checkvideo(){

        $video =  PremiumVideos::all();


         return Response::json(['code' => 200,'status' => true, 'message' => 'All Promotions','data'=>$video]);

    }
}
