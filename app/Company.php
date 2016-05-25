<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $table = "companies";

   protected $fillable = ['id','nombre','descripcion','id_centro'];

   public function centers(){
   		return $this->hasMany('App\Center');
   }
}
