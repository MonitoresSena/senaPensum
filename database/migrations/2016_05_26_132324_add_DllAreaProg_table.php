<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDllAreaProgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DllAreaProg', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_area')->unsigned(); 
            $table->Integer('id_programa')->unsigned();

            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade');

            $table->foreign('id_programa')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::drop('DllAreaProg');
    }
}
