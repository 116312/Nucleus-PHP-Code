<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PromotionManagement;
use Response;

class PromotionalManagementController extends Controller
{
    public function getallpromotions(){

        $data = [];
        
        $combinepromotions = PromotionManagement::all();

        foreach($combinepromotions as $key => $promo)
        { 
           if($promo->promo_type == 'category'){

               $data[$key] = PromotionManagement::where('id',$promo->id)->with('promocategory.category','promofiles')->first();

           }

           if($promo->promo_type == 'challenge'){
         
               $data[$key]= PromotionManagement::where('id', $promo->id)->with('promochallenges.nucleuschallenge.challengecategory','promofiles')->first();
           }



            $data[$key] = PromotionManagement::where('id',$promo->id)->with('promofiles')->first();


        }




         return Response::json(['code' => 200,'status' => true, 'message' => 'All Promotions','data'=>$data]);


    }
}
