<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStartDurationAndEndDurationIntoWorkoutChapters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premium_workout_chapters', function (Blueprint $table) {
            //
             $table->string('start_duration')->nullable()->after('chapter');
             $table->string('end_duration')->nullable()->after('start_duration');
        });
           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premium_workout_chapters', function (Blueprint $table) {
            $table->dropColumn('start_duration');
            $table->dropColumn('end_duration');
        });
    }
}
