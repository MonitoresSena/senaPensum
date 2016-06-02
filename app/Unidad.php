<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Unidad extends Model
{
    protected $table = "unidad";

    protected $fillable = [
        'nombre', 'id_resultado'
    ];

    public function Resultado(){
        return $this->belongsTo('App\Resultado', 'id_resultado');
    }        
    
    public function TotalGuias(){
        $guias = DB::table("documentos AS t")
                ->select("t.id")
                ->where("t.unidad_id", "=", $this->id)
                ->where("t.tipo_id", "=", 1);        
        return count($guias->get());
    }
    
    public function TotalEC(){
        $ec = DB::table("documentos AS t")
                ->select("t.id")
                ->where("t.unidad_id", "=", $this->id)
                ->where("t.tipo_id", "=", 2);
        return count($ec->get());
    }
    
    public function TotalEP(){
        $ep = DB::table("documentos AS t")
                ->select("t.id")
                ->where("t.unidad_id", "=", $this->id)
                ->where("t.tipo_id", "=", 3);
        return count($ep->get());
    }
}
