<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemViewPurchasedCountToItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Make sure it table not create
        Schema::table('items', function (Blueprint $table) {
            $table->integer('item_view_count')->default(0); //Item view count
            $table->integer('item_purchased_count')->default(0); //Item Purchased cOunt
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function($table) {
            $table->dropColumn('item_view_count');
            $table->dropColumn('item_purchased_count');
        });
    }
}
