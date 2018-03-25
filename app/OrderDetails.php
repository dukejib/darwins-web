<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    protected $fillable = ['order_id','item_id','item_name','item_qty','item_price'];


    /** Relationships */

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /** Methods */
}
