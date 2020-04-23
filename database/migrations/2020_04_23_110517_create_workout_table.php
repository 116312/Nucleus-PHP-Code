<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_details', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('workout_type_id');
             $table->foreign('workout_type_id')->references('id')->on('workout_type')->onDelete('cascade');
             $table->string('name');
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
        Schema::dropIfExists('workout_details');
    }
}