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
        Schema::create('training_programs', function (Blueprint $table) {
            $table->increments('id_programa')->unsigned();
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

            $table->foreign('id_programa')->references('id_programa')->on('dll_area_prog');

            $table->foreign('id_programa')->references('id_programa')->on('dll_prog_comp');

            $table->timestamps();
        });

        Schema::create('dll_area_prog', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_area')->unsigned(); 
            $table->Integer('id_programa')->unsigned();

            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade');

            $table->foreign('id_programa')->references('id')->on('training_programs')->onDelete('cascade');
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
        Schema::drop('training_programs');
    }
}
