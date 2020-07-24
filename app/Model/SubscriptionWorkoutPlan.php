<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionWorkoutPlan extends Model
{
        protected $table ='subscription_workout_plan';



     public function subscriptiondetails(){

        return $this->hasOne('App\Model\SubscriptionDetails','subscription_workout_plan_id');
    }

     public function subscriptionbenifits(){

        return $this->hasMany('App\Model\SubscriptionBenifits','subscription_workout_plan_id');
    }


     public function subscriptionworkoutcategory()
    {
        return $this->belongsTo('App\Model\SubscribedWorkoutCategory','subscribed_workout_category_id');
    }


     public function subscriptionplan()
    {
        return $this->belongsTo('App\Model\SubscriptionPlan','subscription_plan_id');
    }
}
