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
            $table->string('transaction_hash'); //If Bitcoin
            $table->double('value',8,8); //Comes in satoshi, convert in Bitcoin
            $table->double('usd'); //Convert bitcoin to usd - if USPS / VPC
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
