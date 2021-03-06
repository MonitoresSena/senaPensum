<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompetenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Competencia', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('programa_id')->unsigned();
            $table->string('Codigo',15);
            $table->string('Denominacion',45);
            $table->integer('Duracion');
            $table->integer('Estado');
            
            $table->foreign('programa_id')->references('id')->on("programs")->onDelete("cascade");
            
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
        Schema::drop('Competencia');
    }
}
