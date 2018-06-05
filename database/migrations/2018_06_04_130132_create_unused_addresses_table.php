<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnusedAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unused_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('address');
            $table->string('index');
            $table->boolean('in_use')->default(1); // 0 = is not , 1 = in use
            $table->integer('order_id')->unsigned()->nullable(); //Order with which we are associating it
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
        Schema::drop('unused_addresses');
    }
}
