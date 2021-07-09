<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_challenges', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('promo_id');
             $table->foreign('promo_id')->references('id')->on('promotion_management')->onDelete('cascade');

            $table->unsignedBigInteger('nucleus_challenge_id');
            $table->foreign('nucleus_challenge_id')->references('id')->on('nucleuschallenges')->onDelete('cascade');
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
        Schema::dropIfExists('promo_challenges');
    }
}
