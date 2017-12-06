<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClientsTableAddNewAddressColmuns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('clients', function (Blueprint $table)
        {

            $table->string('cpf');
            $table->string('shipping_address');
            $table->string('shipping_number');
            $table->string('shipping_neighborhood');
            $table->string('shipping_postalcode');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_country');
            $table->string('shipping_complement');
            $table->string('billing_address');
            $table->string('billing_number');
            $table->string('billing_neighborhood');
            $table->string('billing_postalcode');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_country');
            $table->string('billing_complement');

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
