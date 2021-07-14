<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_video', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_details_id');
            $table->foreign('subscription_details_id')->references('id')->on('subscription_plan_details')->onDelete('cascade');
            $table->unsignedBigInteger('premium_video_id');
            $table->foreign('premium_video_id')->references('id')->on('premium_videos')->onDelete('cascade');
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
        Schema::dropIfExists('subscription_video');
    }
}
