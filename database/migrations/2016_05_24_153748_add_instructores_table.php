<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstructoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('instructores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre',30);
            $table->string('Apellido',30);
            $table->bigInteger('Identificacion');
            $table->string('Email',30);
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
        Schema::drop('instructores');
    }
}
