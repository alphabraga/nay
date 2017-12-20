<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequestItens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestitens', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('request_id');
            $table->index('request_id');
            $table->integer('salesitem_id');
            $table->index('salesitem_id');
            /*$table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('no action')
                  ->onUpdate('no action'); */
            $table->float('price', 10, 2);
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
