<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NucleusChallenges extends Model
{

	 protected $table= 'nucleuschallenges';

protected $fillable = [
        'prize_level', 
    ];
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


     public function nucleuschallengeprize()
    {
        return $this->hasMany('App\Model\NucleusChallengesPrize','nucleus_challenge_id');
    }
}
