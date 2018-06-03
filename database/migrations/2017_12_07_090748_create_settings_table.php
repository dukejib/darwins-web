<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('address_line1');
            $table->string('address_line2');
            $table->string('address_line3');
            $table->string('contact_line1');
            $table->string('contact_line2');
            $table->string('contact_mobile');
            $table->string('contact_email');
            $table->integer('carousel_time')->default(2500);
            $table->float('fed_tax')->default(0.15);
            $table->float('shipping_charges')->default(0.25);
            $table->string('tos_filename')->nullable();         //Terms of Service
            $table->string('brochure_filename')->nullable();    //Brochure File
            $table->text('refill_statement')->nullable();       //Refill Statement
            $table->text('app_statement')->nullable();          //App Statement     
            $table->string('datafile')->nullable();             //Data File / VPC Book Etc
            $table->string('v2apikey')->nullable();
            $table->string('bcwallet')->nullable();
            $table->string('xpub1')->nullable();
            $table->string('xpub2')->nullable();
            $table->string('xpub3')->nullable();
            $table->string('xpub4')->nullable();
            $table->string('xpub5')->nullable();
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
        Schema::drop('settings');
    }
}
