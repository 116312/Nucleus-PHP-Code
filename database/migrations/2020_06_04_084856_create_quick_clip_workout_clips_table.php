<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickClipWorkoutClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_clip_workout_clips', function (Blueprint $table) {
            $table->id();
              $table->unsignedBigInteger('quick_clip_workout_details_id');
             $table->foreign('quick_clip_workout_details_id')->references('id')->on('quick_clip_workout_details')->onDelete('cascade');
               $table->unsignedBigInteger('quick_clip_id');
              $table->foreign('quick_clip_id')->references('id')->on('quick_clips')->onDelete('cascade');
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
        Schema::dropIfExists('quick_clip_workout_clips');
    }
}
