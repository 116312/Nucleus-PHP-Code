<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PromotionWorkoutCategory extends Model
{
     

   protected $table = 'promo_category';

           
     public function promomanagement()
    {
        return $this->belongsTo('App\Model\PromotionManagement','promo_id');
    }



      public function category()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }








}
