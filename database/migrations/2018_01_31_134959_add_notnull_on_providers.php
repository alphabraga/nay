<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotnullOnProviders extends Migration
{


    public function __construct()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('json', 'string');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function($table)
        {

            $table->string('personal_contact')->nullable()->change(); 
            $table->string('postal_code')->nullable()->change(); 
            $table->string('address')->nullable()->change(); 
            $table->string('address_number')->nullable()->change(); 
            $table->string('address_complement')->nullable()->change(); 
            $table->string('phone')->nullable()->change(); 
            $table->string('cellphone')->nullable()->change(); 
            $table->string('email')->nullable()->change(); 
            $table->string('site')->nullable()->change(); 
            $table->string('phone')->nullable()->change(); 
            $table->integer('updated_by')->nullable()->change(); 

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
