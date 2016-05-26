<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
	protected $table = "Resultado";

    protected $fillable = [
        'Denominacion', 'Id_competencia', 'Estado'
    ];

	public function Competencia(){
        return $this->belongsTo('App\Competencia');
    }
}
