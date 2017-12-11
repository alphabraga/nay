<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldsToConfigsAddingFieldsAlias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configurations', function (Blueprint $table)
        {

            $table->string('custom_field1_label');
            $table->string('custom_field2_label');
            $table->string('custom_field3_label');
            $table->string('custom_field4_label');
            $table->string('custom_field5_label');
            $table->string('custom_field6_label');

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
