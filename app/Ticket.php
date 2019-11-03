<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
     protected $fillable = [
        'user_id','cellar_id','post_id','car_id','entry_time','exit_time','id_customer','systemTimeEntry'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function car()
    {
        return $this->belongsTo('App\Car');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
     public function customer()
    {
        return $this->belongsTo('App\customer');
    }


}
