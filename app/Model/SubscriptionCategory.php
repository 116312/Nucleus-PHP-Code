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

    public function usersubscriptionplandetails(){

      return $this->belongsTo('App\Model\UserSubscriptionPlanDetails','subscription_category_id');
        
    }
    
    
     public function subscriptionplan()
    {
     return $this->belongsToMany(SubscriptionPlan::class, 'subscription_plan_details');
    }
    
    
    
}
