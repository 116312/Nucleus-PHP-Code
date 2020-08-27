<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdditionalBenifits extends Model
{
     protected $table ='additional_benifits';



        public function subscriptionplandetails()
    {
        return $this->belongsTo('App\Model\SubscriptionPlanDetails','subscription_plan_details_id');
    }
}
