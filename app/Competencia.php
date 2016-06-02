<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    protected $table = "Competencia";
    protected $fillable = ["Codigo", "Denominacion", "Duracion","Estado"];

}
