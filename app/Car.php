<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'model','color','placa','idcustomers'
    ];

    public function ticket()
    {
        return $this->hasOne('App\Ticket');
    }
}
