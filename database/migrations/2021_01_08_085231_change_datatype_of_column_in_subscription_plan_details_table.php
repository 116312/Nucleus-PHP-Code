<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDatatypeOfColumnInSubscriptionPlanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_plan_details', function (Blueprint $table) {
            $table->integer('original_price')->change();
             $table->integer('offer_percentage')->change();
            
             $table->integer('per_month_price')->change();
             $table->integer('plan_duration_price')->change(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_plan_details', function (Blueprint $table) {
            $table->dropColumn('original_price');
            $table->dropColumn('offer_percentage');
            $table->dropColumn('per_month_price');
            $table->dropColumn('plan_duration_price');
        });
    }
}
