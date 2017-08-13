<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$faker = \Faker\Factory::create();

    	for ($i=0; $i <= 10; $i++)
    	{ 
    		
    		$provider = new \App\Nay\Model\ProvidersModel();

    		$name = $faker->company;

    		$slug = str_slug($name);

    		$tags = [];

    		for ($i=0; $i < 6; $i++)
    		{ 
    			$tags[] = $faker->name;
    		}

			$provider->slug              = $slug;
			$provider->name              = $name;
			$provider->description       = $faker->paragraphs(1, true);
			$provider->tags              = $tags;
            $provider->cellphone         = $faker->postcode;
            $provider->phone             = $faker->postcode;
            $provider->postal_code       = $faker->postcode;
            $provider->address           = $faker->address;
            $provider->address_number    = $faker->postcode;
            $provider->address_complement= $faker->address;
            $provider->email             = $faker->email;
            $provider->site              = $faker->domainName;
            $provider->personal_contact  = $faker->name;
            $provider->created_by        = 1;
			$provider->updated_by        = 1;
			$provider->created_at        = date('Y-m-d H:i:s');

    		$provider->save();

    		$provider->saveFakeImage($faker);
    	}
    }
}
