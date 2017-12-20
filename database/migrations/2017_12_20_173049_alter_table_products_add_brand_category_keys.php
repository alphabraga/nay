<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProductsAddBrandCategoryKeys extends Migration
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
            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->onDelete('no action')
                  ->onUpdate('no action');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
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
