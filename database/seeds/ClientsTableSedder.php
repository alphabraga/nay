<?php

use Illuminate\Database\Seeder;

class ClientsTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$faker = \Faker\Factory::create();

        $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
        $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
        $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));


        foreach (range(1,50) as $index)
        {
            $client = new \App\Nay\Model\EntitiesModel();

            $client->entity_category       = \App\Nay\Model\EntityCategory::Client;
            $client->name                  = $faker->name;
            $client->phone                 =  $faker->phoneNumber;
            $client->cellphone             = $faker->cellphone;
            $client->cpf                   = $faker->cpf(false);
            $client->shipping_address      = $faker->address;
            $client->shipping_number       = $faker->buildingNumber;
            $client->shipping_neighborhood = $faker->word;
            $client->shipping_postalcode   = $faker->postcode;
            $client->shipping_city         = $faker->city;
            $client->shipping_state        = $faker->stateAbbr;
            $client->shipping_country      = 'BR';
            $client->shipping_complement   = $faker->secondaryAddress;
            $client->billing_address       = $faker->address;
            $client->billing_number        = $faker->buildingNumber;
            $client->billing_neighborhood  = $faker->word;
            $client->billing_postalcode    = $faker->postcode;
            $client->billing_city          = $faker->city;
            $client->billing_state         = $faker->stateAbbr;
            $client->billing_country       = 'BR';
            $client->billing_complement    = $faker->secondaryAddress;

            $client->created_by  = 1;
            $client->updated_by  = 1;
            $client->deleted_by  = 1;
            $client->created_at  = \Carbon\Carbon::now();

            $client->save();
        }
    }
}