<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
     protected $table = "Instructores";
    protected $fillable = ["Nombre", "Apellido", "Identificacion", "Email"];
}
