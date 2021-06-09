<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PromotionalVideos extends Model
{
    protected $table ='promotional_videos';


     public function promomanagement()
    {
        return $this->belongsTo('App\Model\PromotionManagement','promo_id');
    }
   
      public function getVideoAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }
}
    
}
