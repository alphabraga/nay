<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTableClientsToEntityAndAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::rename('clients', 'entities');

        Schema::table('entities', function($table)
        {

            $table->string('slug')->nullable();
            $table->string('description')->nullable();
            $table->string('personal_contact')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('tags')->nullable();
            $table->string('color')->nullable();
            $table->string('cnpj')->nullable();
            $table->integer('entity_category')->nullable();

        });

        $providers = \App\Nay\Model\ProvidersModel::all();


        foreach($providers as $p)
        {
            $providerData = $p->toArray();

            unset($providerData['id']);

            \App\Nay\Model\EntitiesModel::create($providerData);
        }



        Schema::table('brands', function($table)
        {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['provider_id']);            
        });

        Schema::table('sales', function($table)
        {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['client_id']);            
        });


        Schema::table('brands', function($table)
        {
             $table->addColumn('integer', 'entity_id', ['unsigned' => true, 'length' => 10])->nullable();
             $table->foreign('entity_id')
                      ->references('id')
                      ->on('entities')
                      ->onDelete('no action')
                      ->onUpdate('no action');

        });

        Schema::table('sales', function($table)
        {
            $table->addColumn('integer', 'entity_id', ['unsigned' => true, 'length' => 10])->nullable();
             $table->foreign('entity_id')
                      ->references('id')
                      ->on('entities')
                      ->onDelete('no action')
                      ->onUpdate('no action');

             Schema::enableForeignKeyConstraints();

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
