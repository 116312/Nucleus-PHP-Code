<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class UserSubscriptionDetails extends Model
{
       protected $table ='user_subscription_details';



      public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }


    public function usersubscriptionplandetails()
    {

      return $this->hasOne('App\Model\UserSubscriptionPlanDetails','user_subscription_id');
        
    }


     public function usersubscribedvideosdetails()
    {

      return $this->hasMany('App\Model\UserSubscribedVideosDetails','user_subscription_id');
        
    }
    
}
