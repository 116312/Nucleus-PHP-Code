<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSocialPrivacySettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_privacy_setting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->default('public');
            $table->string('email')->default('public');
            $table->string('height')->default('public');
            $table->string('weight')->default('public');
            $table->string('gender')->default('public');
            $table->string('age')->default('public');
            $table->string('images_videos')->default('public');
            $table->string('workout_result')->default('public');
            

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
        Schema::dropIfExists('user_social_privacy_setting');
    }
}
