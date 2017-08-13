<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAndAddDeletedByWithNullalble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('categories', function (Blueprint $table)
        {
            $table->dropColumn('deleted_by');
        });


        Schema::table('categories', function (Blueprint $table)
        {
            $table->integer('deleted_by')->nullable();
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
