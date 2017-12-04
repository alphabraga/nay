<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSalesTableAddKeyForClientsAdding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('sales', function (Blueprint $table)
        {

            $table->addColumn('integer', 'client_id', ['unsigned' => true, 'length' => 11]);
            $table->addColumn('integer', 'salesman_id', ['unsigned' => true, 'length' => 11]);

            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('no action')
                  ->onUpdate('no action');
            $table->foreign('salesman_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('no action')
                  ->onUpdate('no action');

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
