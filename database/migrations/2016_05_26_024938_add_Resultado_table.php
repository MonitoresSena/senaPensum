<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResultadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Resultado', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Denominacion');
            $table->integer('Id_competencia')->unsigned();;
            $table->integer('Estado');
         
            $table->foreign("Id_competencia")->references("id")->on("Competencia")->onDelete("cascade");

            $table->rememberToken();   
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
        Schema::drop('Resultado');
    }
}
