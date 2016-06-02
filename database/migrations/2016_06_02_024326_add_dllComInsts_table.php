<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDllComInstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dllComInsts', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_instructor')->unsigned(); 
            $table->Integer('id_competencia')->unsigned();

            $table->foreign('id_instructor')->references('id')->on('instructores')->onDelete('cascade');
            $table->foreign("id_competencia")->references("id")->on("Competencia")->onDelete("cascade");
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
        Schema::drop('dllComInsts');
    }
}
