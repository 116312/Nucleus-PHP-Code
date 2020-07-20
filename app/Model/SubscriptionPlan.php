<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
     protected $table ='subscription_plan';


     public function subscribedworkoutcategory(){

        return $this->hasMany('App\Model\SubscribedWorkoutCategory','subscription_plan_id');
    }

}
