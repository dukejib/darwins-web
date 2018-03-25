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
            $table->integer('user_id')->unsigned();
            $table->integer('delivery_status')->default(1); //1 = Pending , 2 = Transit , 3 = Delivered
            $table->integer('sub_total'); //Subtotal of order
            $table->float('tax')->nullable(); //F.E.D tax on Total amount
            $table->float('shipping_charges')->nullable(); //Shipping Charges
            $table->float('order_total');  //Order Total
            $table->integer('payment')->default(1); //1 = Pending, 2 = partial , 3 = full paid
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
