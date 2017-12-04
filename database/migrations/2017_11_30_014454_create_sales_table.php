<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
 

       Schema::create('sales', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('client_id');
            $table->index('client_id');
/*            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('no action')
                  ->onUpdate('no action'); */
            $table->integer('salesman_id');
            $table->index('salesman_id');
/*            $table->foreign('salesman_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('no action')
                  ->onUpdate('no action');*/

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
