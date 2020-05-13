<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNucleusPrizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nucleus_prize', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nucleus_challenge_id');
            $table->foreign('nucleus_challenge_id')->references('id')->on('nucleuschallenges')->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('image');
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
        Schema::dropIfExists('nucleus_prize');
    }
}
