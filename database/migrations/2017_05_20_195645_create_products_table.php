<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->longText('description');
            $table->json('tags');
            $table->integer('quantity_limit');
            $table->integer('quantity');
            $table->float('price', 15, 2);
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
        Schema::dropIfExists('products');
    }
}