<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_section_tittle1');
            $table->longText('service_section_description1');
            $table->string('service_section_tittle2');
            $table->longText('service_section_description2');
            $table->string('service_section_tittle3');
            $table->longText('service_section_description3');
            $table->string('service_section_tittle4');
            $table->longText('service_section_description4');
            $table->string('service_section_tittle5');
            $table->longText('service_section_description5');
            $table->string('service_section_tittle6');
            $table->longText('service_section_description6');
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
        Schema::dropIfExists('about_services');
    }
}
