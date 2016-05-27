<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = "training_programs";

   protected $fillable = ['id','nombre','estado','version','codigo','fecha_inicio','fecha_fin','dur_lectiva','dur_practica','justificacion','requisitos','descripcion','ocupaciones','resultados_practica','proyecto_formativo','url_proyecto_formativo'];

}
