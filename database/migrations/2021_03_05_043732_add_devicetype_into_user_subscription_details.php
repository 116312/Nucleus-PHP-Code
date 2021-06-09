<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDevicetypeIntoUserSubscriptionDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('user_subscription_details', function (Blueprint $table) {
            //
             $table->string('Device_Type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('user_subscription_details', function (Blueprint $table) {
             $table->dropColumn('Device_Type');
        });
    }
}
