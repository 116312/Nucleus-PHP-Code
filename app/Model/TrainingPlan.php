<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TrainingPlan extends Model
{
    protected $table = 'training_plan';

     protected $fillable = ['name'];



     public function traininggoalsplan()
    {
        return $this->hasMany('App\Model\TrainingGoalsPlan','training_plan_id');
    }

}
