<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionCategory extends Model
{
      protected $table ='subscription_category';


        public function subscribedworkoutcategory(){

        return $this->hasMany('App\Model\SubscribedWorkoutCategory','subscription_category_id');
    }


     public function subscriptionplandetails(){

      return $this->hasMany('App\Model\SubscriptionPlanDetails','subscription_plan_id');
        
    }
}
