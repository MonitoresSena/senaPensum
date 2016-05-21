<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "roles";
    protected $fillable = ["nombre"];

    public function usuarios(){
    	# Si quiero obtener los usuarios que tienen este rol
    	return $this->hasMany('App\User');
    	
    	# esto se haría en usuarios
    	# return $this->belogsTo('App\Rol')
    }

}
