<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'number'
    ]; 
    public function cellar()
    {
        return $this->belongsTo('App\Cellar');
    }

    public function ticket()
    {
        return $this->hasOne('App\Ticket');
    }
}



