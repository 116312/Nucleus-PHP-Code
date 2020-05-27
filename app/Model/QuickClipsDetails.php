<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuickClipsDetails extends Model
{
    protected $table = 'quick_clip_details';


   
     public function getSubtitleAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}

      public function getAudioAttribute($value){


           if($value == null){

            return $value;
           }
           else{

            
            return asset('storage/'.$value);
            }

       }

      public function quickclips(){

        return $this->belongsTo('App\Model\QuickClips','quick_clip_id');
    }

        public function voiceguidancetype(){

        return $this->belongsTo('App\Model\VoiceGuidanceType','voice_guidance_type_id');
    }
    

      public function language(){

        return $this->belongsTo('App\Model\Language','language_id');
    }


}
