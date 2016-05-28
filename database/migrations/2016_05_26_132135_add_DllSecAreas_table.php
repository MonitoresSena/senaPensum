<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDllSecAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DllSecAreas', function (Blueprint $table) {
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
        Schema::drop('DllSecAreas');
    }
}
