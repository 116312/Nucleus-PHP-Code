<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNucleuschallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nucleuschallenges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challenge_category_id');
            $table->foreign('challenge_category_id')->references('id')->on('challenge_category')->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('image')->nullabe();
            $table->string('points')->nullabe();
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
        Schema::dropIfExists('nucleuschallenges');
    }
}
