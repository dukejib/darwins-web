<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingTransaction extends Model
{
    protected $table = 'pending_transactions';

    protected $fillable = [
        'order_id','value_in_btc','value_in_usd'
    ];
}
