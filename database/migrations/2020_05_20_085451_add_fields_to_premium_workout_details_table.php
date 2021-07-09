<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPremiumWorkoutDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premium_workout_details', function (Blueprint $table) {
             $table->unsignedBigInteger('workout_type_id');
             $table->foreign('workout_type_id')->references('id')->on('workout_type')->onDelete('cascade');
             $table->unsignedBigInteger('category_id');
             $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
             $table->unsignedBigInteger('premium_workout_id');
             $table->foreign('premium_workout_id')->references('id')->on('premium_videos')->onDelete('cascade');
             $table->string('workout_level');
             $table->string('description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premium_workout_details', function (Blueprint $table) {
            //
        });
    }
}
