<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserSubscribedVideosDetails extends Model
{
     protected $table ='user_subscribed_videos_details';

     public function usersubscriptiondetails()
    {
        return $this->belongsTo('App\Model\UserSubscriptionDetails','user_subscription_id');
    }
    

     public function usersubscriptiondetails()
    {
        return $this->belongsTo('App\Model\PremiumVideos','premium_video_id');
    }
}
