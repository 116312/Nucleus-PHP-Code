<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionalVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('promotion_management')->onDelete('cascade');
            $table->string('video')->nullable();
            $table->string('dacast_link')->nullable();
            $table->string('applicable_for_app');
            $table->string('content_id');

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
        Schema::dropIfExists('promotional_videos');
    }
}
