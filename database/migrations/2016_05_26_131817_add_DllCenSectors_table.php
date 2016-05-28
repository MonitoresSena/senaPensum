<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDllCenSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DllCenSectors', function (Blueprint $table) {
            
            $table->increments('id');
            $table->Integer('id_centro')->unsigned(); 
            $table->Integer('id_sector')->unsigned();

            $table->foreign('id_sector')->references('id')->on('sectors')->onDelete('cascade');

            $table->foreign('id_centro')->references('id')->on('centers')->onDelete('cascade');
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
        Schema::drop('DllCenSectors');
    }
}
