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
        $faker->addProvider(new \JansenFelipe\FakerBR\FakerBR($faker));


        foreach (range(1,10) as $index)
        {
    		
    		$provider = new \App\Nay\Model\EntitiesModel();

    		$name = $faker->company;

    		$slug = str_slug($name);

    		$tags = [];

    		for ($i=0; $i < 6; $i++)
    		{ 
    			$tags[] = $faker->name;
    		}

            $provider->entity_category       = \App\Nay\Model\EntityCategory::Company; 
			$provider->slug                  = $slug;
			$provider->name                  = $name;
            $provider->color                 = $faker->hexcolor;
			$provider->description           = substr($faker->paragraphs(1, true), 0, 100);
			$provider->tags                  = $tags;
            $provider->cellphone             = $faker->postcode;
            $provider->phone                 = $faker->postcode;
            $provider->email                 = $faker->email;
            $provider->site                  = $faker->domainName;
            $provider->personal_contact      = $faker->name;
            $provider->cnpj                  = $faker->cnpj(false);
            $provider->shipping_address      = $faker->address;
            $provider->shipping_number       = $faker->buildingNumber;
            $provider->shipping_neighborhood = $faker->word;
            $provider->shipping_postalcode   = $faker->postcode;
            $provider->shipping_city         = $faker->city;
            $provider->shipping_state        = $faker->stateAbbr;
            $provider->shipping_country      = 'BR';
            $provider->shipping_complement   = $faker->secondaryAddress;
            $provider->billing_address       = $faker->address;
            $provider->billing_number        = $faker->buildingNumber;
            $provider->billing_neighborhood  = $faker->word;
            $provider->billing_postalcode    = $faker->postcode;
            $provider->billing_city          = $faker->city;
            $provider->billing_state         = $faker->stateAbbr;
            $provider->billing_country       = 'BR';
            $provider->billing_complement    = $faker->secondaryAddress;
            $provider->created_by  = 1;
            $provider->updated_by  = 1;
            $provider->deleted_by  = 1;
            $provider->created_at  = \Carbon\Carbon::now();

    		$provider->save();

    		//$provider->saveFakeImage($faker);
    	}
    }
}
