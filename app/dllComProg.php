<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class dllComProg extends Model
{
        protected $table = "dllComProgs";
        protected $fillable = [
        'id_programa', 'id_competencia'
    ];


    public function Programs(){
        return $this->belongsTo('App\Program');
    }  
    public function Competencia(){
        return $this->belongsTo('App\Competencia');
    }      
}
