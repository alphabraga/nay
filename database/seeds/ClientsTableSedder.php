<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
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


        foreach (range(1,100) as $index)
        {
            $client = new \App\Nay\Model\ClientsModel();

            $client->name        = $faker->name;
            $client->phone       = $faker->phoneNumber;
            $client->cellphone   = $faker->cellphone;
            $client->address     = $faker->address;
            $client->postalcode  = $faker->postcode;
            $client->adressnumber= $faker->buildingNumber;
            $client->created_by  = 1;
            $client->updated_by  = 1;
            $client->deleted_by  = 1;
            $client->created_at  = \Carbon\Carbon::now();

            $client->save();
        }
    }
}