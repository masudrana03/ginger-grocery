<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoColumnsToDeliveryManDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_man_details', function (Blueprint $table) {
            $table->boolean('status')->default(false)->after('zone_id');
            $table->boolean('online_status')->default(false)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_man_details', function (Blueprint $table) {
            //
        });
    }
}
