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

        $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
        $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
        $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));


        foreach (range(1,25) as $index)
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
			$provider->description       = substr($faker->paragraphs(1, true), 0, 100);
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
