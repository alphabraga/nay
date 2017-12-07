<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToDefaultClientConfigNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $faker = \Faker\Factory::create();

        $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
        $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
        $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));

        $client = new \App\Nay\Model\ClientsModel();

        $client->name                  = 'Cliente Padrão do Sistema';
        $client->phone                 = '(98) 3222-2222';
        $client->cellphone             = '(98) 99999-9999';
        $client->cpf                   = $faker->cpf(false);
        $client->shipping_address      = $faker->address;
        $client->shipping_number       = $faker->buildingNumber;
        $client->shipping_neighborhood = $faker->streetAddress;
        $client->shipping_postalcode   = $faker->postcode;
        $client->shipping_city         = 'Santa Rita';
        $client->shipping_state        = 'MA';
        $client->shipping_country      = 'BR';
        $client->billing_address       = $faker->streetAddress;
        $client->billing_number        = $faker->buildingNumber;
        $client->billing_neighborhood  = $faker->word;
        $client->billing_postalcode    = $faker->postcode;
        $client->billing_city          = 'Santa Rita';
        $client->billing_state         = 'MA';
        $client->billing_country       = 'BR';
        $client->created_by            = 1;
        $client->shipping_complement   = '';
        $client->billing_complement    = '';
        $client->updated_by            = 1;
        $client->deleted_by            = 1;
        $client->created_at            = \Carbon\Carbon::now();
        $client->updated_at            = \Carbon\Carbon::now();

        $client->save();

        $config = \App\Nay\Model\ConfigurationsModel::first();

        $config->default_client_id = $client->id;

        $config->save();

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
