<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConocimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Conocimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('id_proceso')->unsigned();
            $table->integer('id_unidad')->unsigned();
            $table->integer('estado');
            $table->foreign("id_proceso")->references("id")->on("procesos")->onDelete("cascade");
            $table->foreign("id_unidad")->references("id")->on("unidad")->onDelete("cascade");

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
        Schema::drop('Conocimientos');
    }
}
