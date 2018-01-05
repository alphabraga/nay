<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('slug');
            $table->string('name')->unique();
            $table->string('description');
            $table->string('personal_contact');
            $table->string('postal_code');
            $table->string('address');
            $table->string('address_number');
            $table->string('address_complement');
            $table->string('phone');
            $table->string('cellphone');
            $table->string('email');
            $table->string('site');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
            $table->softDeletes('deleted_at');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
