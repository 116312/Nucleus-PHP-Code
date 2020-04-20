<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NucleusChallenges extends Model
{

	 protected $table= 'nucleuschallenges';


    public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}

public function challengecategory()
    {
        return $this->belongsTo('App\Model\ChallengeCategory','challenge_category_id');
    }
       public function promotionalchallenges()
    {
        return $this->hasMany('App\Model\PromotionNucleusChallenge','nucleus_challenge_id');
    }

}
