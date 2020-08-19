<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PremiumWorkoutChapters extends Model
{
   protected $table = 'premium_workout_chapters';


    public function premiumworkoutdetails()
    {
        return $this->hasMany('App\Model\PremiumWorkoutDetails','premium_workout_details_id');
    }

}
