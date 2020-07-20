<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PremiumVideos extends Model
{
     protected $table = 'premium_videos';


     protected $fillable = [
        'name', 
    ];

      public function getVideoAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}



    public function premiumworkoutdetails(){

        return $this->hasMany('App\Model\PremiumWorkoutDetails','premium_workout_id');
    }

  public function subtitle()
    {
        return $this->hasMany('App\Model\SubtitlePremiumVideo','premium_video_id');
    }

}
