<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('product')->default(1); //Yes it is product
            $table->text('description');
            $table->float('price')->nullable();
            $table->boolean('active')->default(1); //Default is Not
            $table->integer('local_category_id'); //Relationship
            $table->string('slug')->nullable();
            $table->string('slot'); //Featured/Latest/Popular
            $table->string('image');
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
        Schema::drop('items');
    }
}
