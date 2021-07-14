<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscribedVideosDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscribed_videos_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_subscription_id');
            $table->foreign('user_subscription_id')->references('id')->on('user_subscription_details')->onDelete('cascade');
            $table->unsignedBigInteger('premium_video_id');
            $table->foreign('premium_video_id')->references('id')->on('premium_videos')->onDelete('cascade');
            $table->boolean('access')->default(1);
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
        Schema::dropIfExists('user_subscribed_videos_details');
    }
}
