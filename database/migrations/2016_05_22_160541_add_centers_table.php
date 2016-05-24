<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formation_centers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',100);
            $table->integer('id_municipio');

            $table->foreign('id_municipio')->references('id')->on('cities');

            $table->foreign('id')->references('id_centro')->on('dll_cen_sectors');
            $table->timestamps();
        });

        Schema::create('dll_cen_sectors', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_centro')->unsigned(); 
            $table->Integer('id_sector')->unsigned();

            $table->foreign('id_sector')->references('id')->on('sectors')->onDelete('cascade');

            $table->foreign('id_centro')->references('id')->on('formation_centers')->onDelete('cascade');
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
        Schema::drop('formation_centers');
    }
}
