<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableClientsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function($table)
        {
            $table->integer('deleted_by')->nullable()->change();
            $table->string('phone')->nullable()->change(); 
            $table->string('cellphone')->nullable()->change();
            $table->string('cpf')->nullable()->change();
            $table->string('shipping_address')->nullable()->change();
            $table->string('shipping_number')->nullable()->change();
            $table->string('shipping_neighborhood')->nullable()->change();
            $table->string('shipping_postalcode')->nullable()->change(); 
            $table->string('shipping_city')->nullable()->change();
            $table->string('shipping_state')->nullable()->change(); 
            $table->string('shipping_country')->nullable()->change(); 
            $table->string('shipping_complement')->nullable()->change();
            $table->string('billing_address')->nullable()->change();  
            $table->string('billing_number')->nullable()->change(); 
            $table->string('billing_neighborhood')->nullable()->change();
            $table->string('billing_postalcode')->nullable()->change();  
            $table->string('billing_city')->nullable()->change();     
            $table->string('billing_state')->nullable()->change();
            $table->string('billing_country')->nullable()->change(); 
            $table->string('billing_complement')->nullable()->change(); 
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
