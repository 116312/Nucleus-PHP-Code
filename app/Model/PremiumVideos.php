<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PremiumVideos extends Model
{
     protected $table = 'premium_videos';


     protected $fillable = [
        'name', 
    ];

      public function getVideoAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}
}
