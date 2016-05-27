<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    protected $table = "Criterios";

    protected $fillable = [
        'nombre', 'id_resultado','estado'
    ];

	public function Competencia(){
        return $this->belongsTo('App\Resultado');
    }
}
