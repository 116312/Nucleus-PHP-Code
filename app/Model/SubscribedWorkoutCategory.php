<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscribedWorkoutCategory extends Model
{
    
   protected $table = 'subscribed_workout_category';



    public function workoutcategory()
    {
        return $this->belongsTo('App\Model\Category','categories_id');
    }


     public function subscriptioncategory()
    {
        return $this->belongsTo('App\Model\SubscriptionCategory','subscription_category_id');
    }


    
     public function subscriptionworkoutplan()
    {
        return $this->hasMany('App\Model\SubscriptionWorkoutPlan','subscribed_workout_category_id');
    }


    
}
