<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSubscriptionBenifitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('subscription_benifits');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('subscription_benifits', function (Blueprint $table) {
              $table->id();
            $table->unsignedBigInteger('subscription_workout_plan_id');
            $table->foreign('subscription_workout_plan_id')->references('id')->on('subscription_workout_plan')->onDelete('cascade');
             $table->string('benifits');
           
            $table->timestamps();
        });
    }
}
