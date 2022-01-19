<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id');
            $table->string('title');
            $table->double('price')->default(0);
            $table->string('type')->nullable();
            $table->integer('from')->nullable();
            $table->integer('to')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('shipping_services');
    }
}
 