<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = "centers";

   protected $fillable = ['id','nombre','descripcion','id_municipio'];

  
}


