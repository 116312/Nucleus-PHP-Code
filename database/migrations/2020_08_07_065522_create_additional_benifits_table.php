<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalBenifitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_benifits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_plan_details_id');
            $table->foreign('subscription_plan_details_id')->references('id')->on('subscription_plan_details')->onDelete('cascade');
             $table->string('benifits');
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
        Schema::dropIfExists('additional_benifits');
    }
}
