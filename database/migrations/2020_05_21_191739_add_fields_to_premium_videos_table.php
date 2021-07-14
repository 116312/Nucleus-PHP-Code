<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPremiumVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premium_videos', function (Blueprint $table) {
            $table->string('language');
            $table->integer('total_subtitle')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premium_videos', function (Blueprint $table) {
          $table->dropColumn('language');
          $table->dropColumn('total_subtitle');
        });
    }
}
