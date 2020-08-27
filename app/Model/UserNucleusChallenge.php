<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserNucleusChallenge extends Model
{
    protected $table ='user_challenge';


     public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

      public function nucleuschallenge()
    {
        return $this->belongsTo('App\Model\NucleusChallenges','nucleus_challenge_id');
    }
}
