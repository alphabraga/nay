<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('categories', function (Blueprint $table)
        {
            $table->string('color');
        });

        Schema::table('brands', function (Blueprint $table)
        {
            $table->string('color');
        });

        Schema::table('providers', function (Blueprint $table)
        {
            $table->string('color');
        });

        Schema::table('shipping_company', function (Blueprint $table)
        {
            $table->string('color');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
