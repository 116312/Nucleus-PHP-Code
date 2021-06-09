<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSubscriptionWorkoutPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::dropIfExists('subscription_workout_plan'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('subscription_workout_plan', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('subscribed_workout_category_id');
            $table->foreign('subscribed_workout_category_id')->references('id')->on('subscribed_workout_category')->onDelete('cascade');

            $table->unsignedBigInteger('subscription_plan_id');
            $table->foreign('subscription_plan_id')->references('id')->on('subscription_plan')->onDelete('cascade');
         
            $table->timestamps();
        });
    }
}
