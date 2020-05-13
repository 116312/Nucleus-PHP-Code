<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PremiumWorkoutDetails extends Model
{
    protected $table = 'premium_workout_details';


   
     public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}



}
