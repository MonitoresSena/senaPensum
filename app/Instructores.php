<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructores extends Model
{
    protected $table = "Instructores";
    protected $fillable = ["Nombre", "Apellido", "Identificacion", "Email"];

}
