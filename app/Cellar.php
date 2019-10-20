<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellar extends Model
{
    protected $fillable = [
        'name'
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}


