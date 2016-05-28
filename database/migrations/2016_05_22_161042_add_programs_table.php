<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',150);
            $table->integer('estado');
            $table->integer('version');
            $table->string('codigo',12);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('dur_lectiva');
            $table->integer('dur_productiva');
            $table->text('justificacion');
            $table->text('descripcion');
            $table->text('requisitos');
            $table->text('resultados_practica');
            $table->string('ocupaciones',200);
            $table->string('proyecto_formativo',100);
            $table->string('url_proyecto_formativo',200);

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
        Schema::drop('programs');
    }
}
