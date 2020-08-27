<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PromotionFiles extends Model
{
      protected $table  ='promo_files';



        public function promomanagement()
    {
        return $this->belongsTo('App\Model\PromotionManagement','promo_id');
    }




    public function getFileAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }
}
}
