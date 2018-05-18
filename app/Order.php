<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    // protected $fillable = [
    //     'user_id','delivery_status','sub_total','tax','shipping_charges','order_total','payment'
    // ];

    protected $fillable = [
        'user_id','sub_total','tax','shipping_charges','order_total_usd','order_total_btc','btc_address'
    ];

    /** Relationships */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order_details()
    {
        return $this->hasMany('App\OrderDetails');
    }
    /** Methods */

    /** Event Handling */
    protected static function boot() {
        parent::boot();
        
        Order::deleting(function($order) {
            $order->order_details()->delete();
        });
    }
}
