<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellar extends Model
{
    protected $fillable = [
        'name','cantidadPuestos'
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}


