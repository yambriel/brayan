<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','last_name','email','carnet','phone','extension',
    ];

    public function ticket()
    {
        return $this->hasOne('App\Ticket');
    }

}
