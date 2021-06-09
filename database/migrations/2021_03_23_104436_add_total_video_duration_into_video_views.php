<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalVideoDurationIntoVideoViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
          Schema::table('video_views', function (Blueprint $table) {
          $table->integer("total_video_duration")->after('user_id');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_views', function($table)
        {
        $table->integer('total_video_duration');
        });
    }
}
