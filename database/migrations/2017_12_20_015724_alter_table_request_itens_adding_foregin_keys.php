<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRequestItensAddingForeginKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       Schema::table('requestitens', function (Blueprint $table)
       {
            $table->foreign('request_id')
                  ->references('id')
                  ->on('requests')
                  ->onDelete('no action')
                  ->onUpdate('no action');

            $table->foreign('salesitem_id')
                  ->references('id')
                  ->on('salesitens')
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
