<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouriteVideoTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_FavouriteVideo', function (Blueprint $table) {
            $table->id("FavouriteVideo_Id");
            $table->integer("User_Id");
            $table->integer("Video_Id");
            $table->enum('Favourite_Status',['1','0'])->default('1');
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
        Schema::dropIfExists('Tb_FavouriteVideo');
    }
}
