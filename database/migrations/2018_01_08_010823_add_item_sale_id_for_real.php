<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemSaleIdForReal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('salesitens', function (Blueprint $table)
       {
            $table->foreign('sale_id')
                  ->references('id')
                  ->on('sales')
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
