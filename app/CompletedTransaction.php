<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompletedTransaction extends Model
{
    protected $table = 'completed_transactions';

    protected $fillable = [
        'unique_id',
        'satoshi_value',
        'amount_in_btc',
        'qr_address',
        'transaction_hash',
        'confirmation',
        'order_id',
        'amount_in_usd',
        'payment_mode'
    ];
}
