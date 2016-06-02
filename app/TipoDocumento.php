<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = "tipo_documentos";
    protected $fillable = ['tipo', 'descripcion'];
            
}
