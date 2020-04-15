<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChallengeCategory extends Model
{
    protected $table= 'challenge_category';


     public function nuceluschallenge()
    {
         return $this->hasMany('App\Model\NucleusChallenge','challenge_category_id');
    }


}
