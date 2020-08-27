<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TrainingGoalsDescription extends Model
{
        protected $table ='training_goals_descriptions';

           public function traininggoals()
    {
        return $this->belongsTo('App\Model\TrainingGoals','training_goals_id');
    }
}
