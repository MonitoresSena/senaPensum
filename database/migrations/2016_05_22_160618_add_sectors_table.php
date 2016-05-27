<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50);

            $table->foreign('id')->references('id_sector')->on('dll_sec_areas');

            $table->foreign('id')->references('id_sector')->on('dll_cen_sectors');
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
        Schema::drop('sectors');
    }
}
