<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PromotionManagement extends Model
{
            protected $table  ='promotion_management';




       public function promocategory()
    {
        return $this->hasOne('App\Model\PromotionWorkoutCategory','promo_id');
    }



        public function promofiles()
    {
        return $this->hasOne('App\Model\PromotionFiles','promo_id');
    }



         public function promochallenges()
    {
        return $this->hasOne('App\Model\PromotionNucleusChallenge','promo_id');
    }



          public function promovideo()
    {
        return $this->hasOne('App\Model\PromotionalVideos','promo_id');
    }

 
}
