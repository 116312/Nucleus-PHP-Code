<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPlanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_category_id');
            $table->foreign('subscription_category_id')->references('id')->on('subscription_category')->onDelete('cascade');
            $table->unsignedBigInteger('subscription_plan_id');
            $table->foreign('subscription_plan_id')->references('id')->on('subscription_plan')->onDelete('cascade');
            $table->string('original_price');
            $table->integer('offer_percentage');
            $table->integer('number_of_month');
            $table->string('per_month_price');
            $table->string('plan_duration_price'); 
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
        Schema::dropIfExists('subscription_plan_details');
    }
}
