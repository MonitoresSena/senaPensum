<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = "sectors";

   protected $fillable = ['id','nombre', 'id_area','id_centro'];

   public function center(){
   		return $this->belogsTo('App\Center')
   }

   public function areas(){
   		return $this->hasMany('App\Area');
   }
}
