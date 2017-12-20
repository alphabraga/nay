<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('requests', function (Blueprint $table)
        {
            $table->increments('id');
            $table->addColumn('integer', 'provider_id', ['unsigned' => true, 'length' => 10])->nullable();
            $table->index('provider_id');
/*            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('no action')
                  ->onUpdate('no action'); */
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
