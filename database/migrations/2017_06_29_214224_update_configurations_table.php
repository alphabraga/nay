<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configurations', function (Blueprint $table)
        {
            $table->string('pagseguro_cms_version_name')->nullable();
            $table->string('pagseguro_module_version_name')->nullable();
            $table->string('pagseguro_cms_version_release')->nullable();
            $table->string('pagseguro_module_version_release')->nullable();
            $table->string('pagseguro_environment')->nullable();
            $table->string('pagseguro_email')->nullable();
            $table->string('pagseguro_key')->nullable();
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