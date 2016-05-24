<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $table = "companies";

   protected $fillable = ['id','nombre','id_centro','descripcion'];

   public function centers(){
   		return $this->hasMany('App\Center');
   }
}
