<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToNucleuschallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nucleuschallenges', function (Blueprint $table) {
            $table->string('days_per_week')->nullable();
            $table->string('number_of_weeks')->nullable();
            $table->string('season')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nucleuschallenges', function (Blueprint $table) {
            $table->dropColumn('days_per_week');
            $table->dropColumn('number_of_weeks');
            $table->dropColumn('season');
        });
    }
}
