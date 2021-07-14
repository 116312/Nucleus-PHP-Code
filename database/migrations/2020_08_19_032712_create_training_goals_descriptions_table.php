<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingGoalsDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_goals_descriptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('training_goals_id');

            $table->foreign('training_goals_id')->references('id')->on('training_goals')->onDelete('cascade');
            $table->string('descriptions');
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
        Schema::dropIfExists('training_goals_descriptions');
    }
}
