<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('state')->nullable();
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('city');
            $table->string('zip');
            $table->tinyInteger('type')->comment('1 for billing, 2 for shipping');
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
        Schema::dropIfExists('addresses');
    }
}
