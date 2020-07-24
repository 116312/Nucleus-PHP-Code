<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
     protected $table ='subscription_plan';


     public function subscribedworkoutplan(){

        return $this->hasMany('App\Model\SubscriptionWorkoutPlan','subscription_plan_id');
    }

}
