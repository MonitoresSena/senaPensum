<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDllCompCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DllComCenters', function (Blueprint $table) {
    
            $table->increments('id');
            $table->Integer('id_empresa')->unsigned(); 
            $table->Integer('id_centro')->unsigned();

            $table->foreign('id_empresa')->references('id')->on('companies')->onDelete('cascade');

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
        Schema::drop('DllComCenters');
    }
}
