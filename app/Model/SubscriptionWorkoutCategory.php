<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionWorkoutCategory extends Model
{
          protected $table ='subscription_workout_category';


      public function workoutcategory()
    {
        return $this->belongsTo('App\Model\Category','categories_id');
    }


     public function subscriptionplandetails()
    {
        return $this->belongsTo('App\Model\SubscriptionPlanDetails','subscription_details_id');
    }


    
}
