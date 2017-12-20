<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyAtBrandsAndProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $tb)
        {
            $tb->addColumn('integer', 'provider_id', ['unsigned' => true, 'length' => 10]);
            $tb->index('provider_id');
            $tb->foreign('provider_id')
                ->references('id')
                ->on('providers')
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
