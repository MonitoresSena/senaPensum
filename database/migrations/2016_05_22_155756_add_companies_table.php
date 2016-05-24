<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre', 80);
            $table->text('descripcion');


            $table->foreign('id')->references('id_empresa')->on('dll_comp_centers');
            $table->timestamps();
        });

        Schema::create('dll_comp_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('id_empresa')->unsigned(); 
            $table->Integer('id_centro')->unsigned();

            $table->foreign('id_empresa')->references('id')->on('companies')->onDelete('cascade');

            $table->foreign('id_centro')->references('id')->on('formation_centers')->onDelete('cascade');

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
        Schema::drop('companies');
    }
}
