<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionWorkoutCategoryAdditionalBenifitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_benifits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_workout_category_id');
            $table->foreign('subscription_workout_category_id')->references('id')->on('subscribed_workout_category')->onDelete('cascade');
             $table->string('benifits');
           
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
        Schema::dropIfExists('subscription_benifits');
    }
}
