<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumWorkoutChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_workout_chapters', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('premium_workout_details_id');
            $table->foreign('premium_workout_details_id')->references('id')->on('premium_workout_details')->onDelete('cascade');
            $table->string('chapter');
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
        Schema::dropIfExists('premium_workout_chapters');
    }
}
