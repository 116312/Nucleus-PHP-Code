<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TrainingGoalsPlan extends Model
{
 protected $table = 'goal_and_plan'; 


   public function trainingplan()
    {
        return $this->belongsTo('App\Model\TrainingPlan','training_plan_id');
    }


      public function traininggoals()
    {
        return $this->belongsTo('App\Model\TrainingGoals','training_goals_id');
    }

 
}
