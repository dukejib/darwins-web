<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingTransaction extends Model
{
    protected $table = 'pending_transactions';

    protected $fillable = [
        'transaction_hash','value','order_id','usd'
    ];
}
