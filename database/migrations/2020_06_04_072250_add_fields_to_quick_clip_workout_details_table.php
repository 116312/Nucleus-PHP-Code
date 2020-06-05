<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToQuickClipWorkoutDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quick_clip_workout_details', function (Blueprint $table) {
             $table->unsignedBigInteger('category_id');
             $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
             $table->string('description')->nullable();
             $table->string('rest_period')->nullable();
             $table->string('rest_clip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quick_clip_workout_details', function (Blueprint $table) {
            //
        });
    }
}
