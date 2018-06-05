<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnusedAddress extends Model
{
    protected $table = 'unused_addresses';

    protected $fillable = [
        'uid' ,'address', 'index','in_use','order_id'
    ];
    
}
