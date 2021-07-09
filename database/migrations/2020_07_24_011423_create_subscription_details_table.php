<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_workout_plan_id');
            $table->foreign('subscription_workout_plan_id')->references('id')->on('subscription_workout_plan')->onDelete('cascade');
            $table->integer('original_price');
            $table->integer('offer_percentage');
            $table->integer('number_of_month');
            $table->integer('per_month_price');
            $table->integer('plan_duration_price');
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
        Schema::dropIfExists('subscription_details');
    }
}
