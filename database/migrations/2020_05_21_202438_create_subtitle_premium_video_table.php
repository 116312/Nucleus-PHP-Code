<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtitlePremiumVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtitle_premium_video', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('premium_video_id');
           $table->foreign('premium_video_id')->references('id')->on('premium_videos')->onDelete('cascade');
           $table->unsignedBigInteger('language_id');
           $table->foreign('language_id')->references('id')->on('language')->onDelete('cascade');
           $table->string('subtitle');

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
        Schema::dropIfExists('subtitle_premium_video');
    }
}
