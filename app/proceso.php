<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proceso extends Model
{
    protected $table = "procesos";
    protected $fillable = ["nombre","estado"];
}
