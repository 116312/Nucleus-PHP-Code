<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickClipDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_clip_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quick_clip_id');
            $table->foreign('quick_clip_id')->references('id')->on('quick_clips')->onDelete('cascade');
            $table->unsignedBigInteger('voice_guidance_type_id');
            $table->foreign('voice_guidance_type_id')->references('id')->on('voice_guidance_type')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('language')->onDelete('cascade');
            $table->string('audio');
            $table->string('subtitle');


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
        Schema::dropIfExists('quick_clip_details');
    }
}
