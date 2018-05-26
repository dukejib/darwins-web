<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBusinessStateEmailCompanyToProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function($table) {
            $table->string('business_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('state')->nullable();
            $table->string('email_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles',function($table){
            $table->dropColumn('business_name');
            $table->dropColumn('company_name');
            $table->dropColumn('state');
            $table->dropColumn('email_address');
        });
    }
}
