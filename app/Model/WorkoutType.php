<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkoutType extends Model
{
     protected $table= 'workout_type';

     protected $fillable = ['name','sequence_no'];


public function workoutdetails()
    {
        return $this->hasMany('App\Model\WorkoutDetails','workout_type_id');
    }

      public function premiumworkoutdetails(){

        return $this->hasMany('App\Model\PremiumWorkoutDetails','workout_type_id');
    }


}
