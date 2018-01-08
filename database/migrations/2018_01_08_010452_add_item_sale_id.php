<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemSaleId extends Migration
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
            $table->addColumn('integer', 'sale_id', ['unsigned' => true, 'length' => 10])->nullable();
            $table->index('sale_id');

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
