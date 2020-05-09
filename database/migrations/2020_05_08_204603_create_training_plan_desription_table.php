<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingPlanDesriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_plan_desription', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('training_plan_id');
            $table->foreign('training_plan_id')->references('id')->on('training_plan')->onDelete('cascade');
            $table->string('monday');
             $table->string('tuesday');
              $table->string('wednesday');
               $table->string('thursday');
                $table->string('friday'); 
                $table->string('saturday');
                 $table->string('sunday');

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
        Schema::dropIfExists('training_plan_desription');
    }
}
