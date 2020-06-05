<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuickClipWorkoutDetails extends Model
{
    protected $table = 'quick_clip_workout_details';


   
     public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}


  public function quickclipworkoutclip()
    {
        return $this->hasMany('App\Model\QuickClipWorkoutClip','quick_clip_workout_details_id');
    }
   
   public function workoutcategory()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }

}
