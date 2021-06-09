<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuickClipWorkoutClip extends Model
{
     protected $table = 'quick_clip_workout_clips';



     public function quickclipworkoutdetails()
    {
        return $this->belongsTo('App\Model\QuickClipWorkoutDetails','quick_clip_workout_details_id');
    }



    public function quickclips()
    {
        return $this->belongsTo('App\Model\QuickClips','quick_clip_id');
    }
}
