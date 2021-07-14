<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PremiumWorkoutDetails extends Model
{
    protected $table = 'premium_workout_details';

      protected $fillable = ['name'];
   
     public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}

   public function premiumworkout()
    {
        return $this->belongsTo('App\Model\PremiumVideos','premium_workout_id');
    }

   public function workoutcategory()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }

   public function workouttype()
    {
        return $this->belongsTo('App\Model\WorkoutType','workout_type_id');
    }

    
  
     public function chapters()
    {
        return $this->hasMany('App\Model\PremiumWorkoutChapters','premium_workout_details_id');
    }



}
