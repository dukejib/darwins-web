<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletedTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');    //for btc
            $table->string('satoshi_value')->nullable(); //For btc
            $table->double('amount_in_btc',15,8)->nullable(); //For btc
            $table->string('qr_address')->nullable(); //For Btc
            $table->string('transaction_hash')->nullable(); //For Btc
            $table->string('confirmation')->nullable(); //For Btc
            $table->integer('order_id')->unsigned()->nullable(); //For BTc/USPS/VPC
            $table->double('amount_in_usd',8,2)->nullable(); //FOR USPS/VPC
            $table->integer('payment_mode'); //1-VPC, 2-USPS, 3-BTc
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
        Schema::drop('completed_transactions');
    }
}
