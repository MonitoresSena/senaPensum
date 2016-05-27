<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = "unidad";

    protected $fillable = [
        'nombre', 'id_resultado'
    ];

	public function Resultado(){
        return $this->belongsTo('App\Resultado');
    }
}
