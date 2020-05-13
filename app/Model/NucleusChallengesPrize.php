<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NucleusChallengesPrize extends Model
{
   protected $table= 'nucleus_prize';



 public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}




        public function nucleuschallenges()
    {
        return $this->belongsTo('App\Model\NucleusChallenges','nucleus_challenge_id');
    }



 }  
