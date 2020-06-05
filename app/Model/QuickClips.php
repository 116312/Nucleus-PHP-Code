<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuickClips extends Model
{
     protected $table = 'quick_clips';




     public function getClipAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

      }


      public function quickclipdetails(){

        return $this->hasMany('App\Model\QuickClipsDetails','quick_clip_id');
    }


     public function quickclipworkoutclip()
    {
        return $this->hasMany('App\Model\QuickClipWorkoutClip','quick_clip_id');
    }

}
