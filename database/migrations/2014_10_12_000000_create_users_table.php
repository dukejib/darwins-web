<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role');//1-customer , 2-affiliate, 99-admin
            $table->string('referred_by')->nullable();
            $table->string('affiliate_id')->unique();
            $table->boolean('book_purchased')->default(false); //Not Purchased (Change this)
            $table->boolean('book_optin')->default(false); //Has he/she opted to buy book?
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
