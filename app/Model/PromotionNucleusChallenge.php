<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PromotionNucleusChallenge extends Model
{
     protected $table = 'promo_challenges';



      public function promomanagement()
    {
        return $this->belongsTo('App\Model\PromotionManagement','promo_id');
    }
   

       public function nucleuschallenge()
    {
        return $this->belongsTo('App\Model\NucleusChallenges','nucleus_challenge_id');
    }


}
