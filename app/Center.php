<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = "formation_centers";

   protected $fillable = ['id_centro','nombre','id_sector','id_municipio'];

   public function company(){
   		return $this->belogsTo('App\Company')
   }

   public function sectors(){
   		return $this->hasMany('App\Sector');
   }
}


