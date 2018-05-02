<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('style');
            $table->string('gif_weight');
            $table->string('flash_weight');
            $table->string('image')->nullable();
            $table->boolean('published')->default(false);
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
        Schema::drop('web_banners');
    }
}
