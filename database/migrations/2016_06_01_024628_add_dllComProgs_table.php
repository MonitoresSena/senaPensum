<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDllComProgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dllComProgs', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_programa')->unsigned(); 
            $table->Integer('id_competencia')->unsigned();

            $table->foreign('id_programa')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::drop('dllComProgs');
    }
}
