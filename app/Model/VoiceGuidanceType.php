<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VoiceGuidanceType extends Model
{
     protected $table= 'voice_guidance_type';



     public function quickclipdetails(){

        return $this->hasMany('App\Model\QuickClipsDetails','voice_guidance_type_id');
    }
}
