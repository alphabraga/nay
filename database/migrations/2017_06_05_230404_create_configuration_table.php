<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations', function($table)
        {

            $table->string('system_name');
            $table->string('fantasy_name');
            $table->string('social_name');
            $table->longText('description');
            $table->json('tags');
            $table->string('email');
            $table->string('address');
            $table->string('postal_code');
            $table->string('phone');
            $table->string('cellphone');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('country_code');
            $table->string('state_code');
            $table->string('pagseguro_api_key');
            $table->integer('created_by');  
            $table->integer('updated_by'); 
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
        Schema::dropIfExists('configrations');
    }
}