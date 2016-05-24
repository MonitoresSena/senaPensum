<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50);

            $table->foreign('id')->references('id_area')->on('dll_sec_areas');

            $table->foreign('id')->references('id_area')->on('dll_area_prog');
            $table->timestamps();
        });

        Schema::create('dll_sec_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_area')->unsigned(); 
            $table->Integer('id_sector')->unsigned();

            $table->foreign('id_sector')->references('id')->on('sectors')->onDelete('cascade');

            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade');
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
        Schema::drop('areas');
    }
}
