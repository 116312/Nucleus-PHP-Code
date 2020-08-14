<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
     protected $table ='subscription_plan';


     public function subscribedworkoutplan(){

        return $this->hasMany('App\Model\SubscriptionWorkoutPlan','subscription_plan_id');
    }


     public function subscriptionplandetails(){

      return $this->hasMany('App\Model\SubscriptionPlanDetails','subscription_plan_id');
        
    }

    
    public function usersubscriptionplandetails(){

      return $this->hasMany('App\Model\UserSubscriptionPlanDetails','subscription_plan_id');
        
    }

}
