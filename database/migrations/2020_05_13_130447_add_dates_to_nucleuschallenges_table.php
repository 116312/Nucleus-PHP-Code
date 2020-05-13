<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesToNucleuschallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nucleuschallenges', function (Blueprint $table) {
            $table->string('windows_start_date')->nullable();
            $table->string('cut_off_date')->nullable();
            $table->string('end_date')->nullable();
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
            $table->dropColumn('windows_start_date');
            $table->dropColumn('cut_off_date');
            $table->dropColumn('end_date');
        });
    }
}
