<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('main_section_tittle')->nullable();
            $table->longText('main_section_description')->nullable();
            $table->string('main_section_image')->nullable();
            $table->string('section2_tittle')->nullable();
            $table->longText('section2_description')->nullable();
            $table->string('section2_image1')->nullable();
            $table->string('section2_image2')->nullable();
            $table->string('who_description')->nullable();
            $table->string('our_description')->nullable();
            $table->string('mission_description')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
