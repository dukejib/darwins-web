<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //User who initiated order
            //$table->integer('delivery_status')->default(1); //1 = Pending , 2 = Transit , 3 = Delivered
            $table->integer('sub_total'); //Subtotal of order
            $table->double('tax')->nullable(); //F.E.D tax on Total amount
            $table->double('shipping_charges')->nullable(); //Shipping Charges
            $table->double('order_total_usd',8,2);  //Order Total in USD
            $table->double('order_total_btc',8,8); //Order Total in BTC
            $table->string('btc_address')->nullable(); //Payment Process Address if BTC
            //$table->integer('payment')->default(1); //1 = Pending, 2 = partial , 3 = full paid
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
