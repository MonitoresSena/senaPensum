<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = "documentos";
    protected $fillable = ['titulo', 'url', 'tipo_id', 'unidad_id'];
    
    public function Tipo(){
        return $this->belongsTo('\App\TipoDocumento');
    }
    
    public function Unidad(){
        return $this->belongsTo('\App\Unidad');
    }
    
    public function Usuario(){
        return $this->belongsTo('\App\User', 'propuesto_por');
    }
    
    public function getEstadoTag(){        
        switch ($this->estado){
            case 0: $clase = 'default'; $texto = 'Borrador';
                break;
            case 1: $clase = 'success'; $texto = 'Aprobado';
                break;
            default: $clase = 'danger'; $texto = '';
        }        
        return  ['clase' => $clase, 'texto' => $texto];
        
    }
}
