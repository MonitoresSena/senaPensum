<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titulo");
            $table->string("url");
            $table->integer("tipo_id")->unsigned();
            $table->integer("unidad_id")->unsigned();
            $table->boolean("estado")->default("0");
            $table->integer("propuesto_por")->unsigned();
            
            $table->foreign("tipo_id")->references("id")->on("tipo_documentos")->onDelete("cascade");
            $table->foreign("unidad_id")->references("id")->on("unidad")->onDelete("cascade");
            $table->foreign("propuesto_por")->references("id")->on("users")->onDelete("cascade");
            
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
        Schema::drop('documentos');
    }
}
