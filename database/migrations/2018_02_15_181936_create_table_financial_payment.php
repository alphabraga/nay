<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFinancialPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_payment', function($table)
        {

            $table->increments('id');
            $table->integer('status');
            $table->decimal('value');
            $table->integer('payment');
            $table->json('tags');
            $table->integer('created_by');  
            $table->integer('updated_by'); 
            $table->integer('deleted_by');  
            $table->timestamps();
            $table->softDeletes();
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
