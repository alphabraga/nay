<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProductsAddBrandCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table)
        {
            $table->addColumn('integer', 'brand_id', ['unsigned' => true, 'length' => 10]);
            $table->index('brand_id');
            $table->addColumn('integer', 'category_id', ['unsigned' => true, 'length' => 10]);
            $table->index('category_id');
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
