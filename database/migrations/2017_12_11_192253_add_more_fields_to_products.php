<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('products', function (Blueprint $table)
        {

            $table->string('barcode');
            $table->string('external_code');
            $table->string('custom_field1');
            $table->string('custom_field2');
            $table->string('custom_field3');
            $table->string('custom_field4');
            $table->string('custom_field5');
            $table->string('custom_field6');

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
