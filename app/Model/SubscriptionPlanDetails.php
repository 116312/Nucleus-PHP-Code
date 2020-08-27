<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlanDetails extends Model
{
   protected $table ='subscription_plan_details';


     public function subscriptioncategory()
    {
        return $this->belongsTo('App\Model\SubscriptionCategory','subscription_category_id');
    }

      public function subscriptionplan()
    {
        return $this->belongsTo('App\Model\SubscriptionPlan','subscription_plan_id');
    }


    public function additionalbenifits(){


    	  return $this->hasMany('App\Model\AdditionalBenifits','subscription_plan_details_id');
    }


    public function premiumworkouts(){

     return $this->hasMany('App\Model\SubscriptionVideo','subscription_details_id');
    	
    }
    
    
     public function premiumvideos()
    {
        return $this->belongsToMany(PremiumVideos::class, 'subscription_video','subscription_details_id','premium_video_id');
    }


}
