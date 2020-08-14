<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserSubscriptionPlanDetails extends Model
{
    protected $table ='user_subscription_plan_details';


    public function subscriptioncategory(){

      return $this->hasMany('App\Model\SubscriptionCategory','subscription_category_id');
        
    }

    public function subscriptionplan(){

      return $this->hasMany('App\Model\SubscriptionPlan','subscription_plan_id');
        
    }


    public function usersubscriptiondetails()
    {

      return $this->belongsTo('App\Model\UserSubscriptionDetails','user_subscription_id');
        
    }
}
