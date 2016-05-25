<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = "training_programs";

   protected $fillable = ['id','nombre','estado','version','codigo','fecha_inicio','fecha_fin','dur_lectiva','dur_practica','justificacion','requisitos','descripcion','ocupaciones','resultados_practica','proyecto_formativo','url_proyecto_formativo','id_competencias'];

   public function area(){
   		return $this->belogsTo('App\Area')
   }

   public function competences(){
   		return $this->hasMany('App\Competences');
   }
}
