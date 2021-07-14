<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDacastLinkToPremiumVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premium_videos', function (Blueprint $table) {
            $table->string('active_for_app');
            $table->string('dacast_link');
            $table->string('content_id')->nullable();
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
             $table->dropColumn('active_for_app');
             $table->dropColumn('dacast_link');
             $table->dropColumn('content_id')->nullable();
        });
    }
}
