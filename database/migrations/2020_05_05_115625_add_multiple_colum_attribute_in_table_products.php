<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumAttributeInTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('pro_country')->default(0)->after('created_at');
            $table->string('pro_energy')->nullable()->after('created_at');
            $table->string('pro_resistant')->nullable()->after('created_at');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['pro_country','pro_energy','pro_resistant']);
        });
    }
}
