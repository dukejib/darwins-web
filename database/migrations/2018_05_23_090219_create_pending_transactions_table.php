<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');    //For Both BITCOIN /USD
            $table->double('value_in_btc',15,8)->nullable(); 
            $table->double('value_in_usd',8,2); //Convert bitcoin to usd - if USPS / VPC
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
        Schema::drop('pending_transactions');
    }
}
