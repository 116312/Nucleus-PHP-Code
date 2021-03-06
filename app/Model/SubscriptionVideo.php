<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionVideo extends Model
{
      protected $table  ='subscription_video';


     public function subscriptionplandetails()
    {
        return $this->belongsTo('App\Model\SubscriptionPlanDetails','subscription_details_id');
    }
    
    
     public function premiumvideos()
    {
        return $this->belongsTo('App\Model\PremiumVideos','premium_video_id');
    }
    
    
    
    
}
 