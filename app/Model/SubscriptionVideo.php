<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubscriptionVideo extends Model
{
      protected $table  ='subscription_video';


     public function subscriptionplandetails()
    {
        return $this->belongsTo('App\Model\SubscriptionCategory','subscription_details_id');
    }
}
