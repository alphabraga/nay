<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyAtSalesOfShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('sales', function (Blueprint $tb)
        {
            $tb->addColumn('integer', 'shipping_company_id', ['unsigned' => true, 'length' => 10]);
            $tb->index('shipping_company_id');
            $tb->foreign('shipping_company_id')
                ->references('id')
                ->on('shipping_company')
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
