<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComInst extends Model
{
    protected $table = "dllComInsts";
        protected $fillable = [
        'id_instructor', 'id_competencia'
    ];


    public function Instructor(){
        return $this->belongsTo('App\Instructor');
    }  
    public function Competencia(){
        return $this->belongsTo('App\Competencia');
    }      
}
