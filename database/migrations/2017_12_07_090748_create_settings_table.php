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
            $table->integer('carousel_time')->default(5000);
            $table->string('tos_filename')->nullable();
            $table->text('refill_statement')->nullable();
            $table->text('app_statement')->nullable();
            $table->string('datafile')->nullable();
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
