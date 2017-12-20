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
            $table->addColumn('integer', 'request_id', ['unsigned' => true, 'length' => 10])->nullable();
            $table->index('request_id');
            $table->addColumn('integer', 'salesitem_id', ['unsigned' => true, 'length' => 10])->nullable();
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
