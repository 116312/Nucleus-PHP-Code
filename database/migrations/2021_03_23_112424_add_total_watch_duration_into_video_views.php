<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalWatchDurationIntoVideoViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('video_views', function (Blueprint $table) {
          $table->integer("total_watch_duration")->after('total_video_duration');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_views', function($table) {
             $table->integer('total_watch_duration');
        
          });
    }
}
