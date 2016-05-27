<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = 'rutas';
    protected $fillable = ['ruta'];

    public function Roles(){
    	return $this->belongsToMany('App\Rol')->withTimestamps();
    }
}