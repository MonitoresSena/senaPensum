<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolRuta extends Model
{
    protected $table = "rol_ruta";
    protected $fillable = ['rol_id', 'ruta_id', 'estado'];
}
