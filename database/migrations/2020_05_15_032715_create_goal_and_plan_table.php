<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalAndPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_and_plan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_goals_id');
            $table->foreign('training_goals_id')->references('id')->on('training_goals')->onDelete('cascade');
            $table->unsignedBigInteger('training_plan_id');
            $table->foreign('training_plan_id')->references('id')->on('training_plan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goal_and_plan');
    }
}
