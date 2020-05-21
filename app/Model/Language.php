<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table='language';


      public function subtitle()
    {
        return $this->hasMany('App\Model\SubtitlePremiumVideo','language_id');
    }
}
