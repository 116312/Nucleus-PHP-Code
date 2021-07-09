<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkoutDetails extends Model
{
    protected $table= 'workout_details';

        
        public function workouttype()
    {
        return $this->belongsTo('App\Model\WorkoutType','workout_type_id');
    }

}
