<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableSalesItens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesitens', function($table)
        {

            $table->increments('id');
            $table->string('state');
            $table->float('quantity', 8, 2);
            $table->addColumn('integer', 'product_id', ['unsigned' => true, 'length' => 11]);
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('no action')
                  ->onUpdate('no action');
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
        //
    }
}
