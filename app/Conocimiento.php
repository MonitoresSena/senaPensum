<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conocimiento extends Model
{
     protected $table = "Conocimientos";

    protected $fillable = [
        'nombre', 'descripcion','id_proceso','id_unidad','estado'
    ];

	public function Unidad(){
        return $this->belongsTo('App\Unidad');

    }
    public function Proceso(){
    	return $this->belongsTo('App\Proceso');
    }
}
