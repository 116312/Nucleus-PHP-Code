<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TrainingGoals extends Model
{
   protected $table = 'training_goals'; 


    public function traininggoalsplan()
    {
        return $this->hasMany('App\Model\TrainingGoalsPlan','training_goals_id');
    }


    
    public function descriptions()
    {
        return $this->hasMany('App\Model\TrainingGoalsDescriptions','training_goals_id');
    }
   
}
