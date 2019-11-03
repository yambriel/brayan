<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
     protected $fillable = [
        'user_id','cellar_id','post_id','car_id','entry_time','exit_time','id_customer','systemTimeEntry'
    ];
    


}
