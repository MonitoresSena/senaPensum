<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";

   protected $fillable = ['id_area','nombre','id_programa'];

   public function sector(){
   		return $this->belogsTo('App\Sector')
   }

   public function programs(){
   		return $this->hasMany('App\Program');
   }
}
