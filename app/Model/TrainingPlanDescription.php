<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TrainingPlanDescription extends Model
{
     protected $table = 'training_plan_desription';


      public function trainingplans()
    {
        return $this->belongsTo('App\Model\TrainingPlan','training_plan_id');
    }
}
