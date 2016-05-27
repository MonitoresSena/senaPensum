<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = "formation_centers";

   protected $fillable = ['id','nombre','descripcion','id_municipio','id_sector'];

   public function company(){
   		return $this->belogsTo('App\Company')
   }

   public function sectors(){
   		return $this->hasMany('App\Sector');
   }
}


