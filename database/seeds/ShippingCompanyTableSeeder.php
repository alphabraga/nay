<?php

use Illuminate\Database\Seeder;

class ShippingCompanyTableSeeder extends Seeder
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
            $shippingCompany = new \App\Nay\Model\ShippingCompanyModel();

			$name = $faker->company;

    		$slug = str_slug($name);

            $shippingCompany->name        = $name;
            $shippingCompany->color       = $faker->hexcolor;
            $shippingCompany->slug        = $slug;
            $shippingCompany->description = substr($faker->paragraphs(1, true), 0, 100);
            $shippingCompany->tags        = [$faker->name, $faker->name, $faker->name];
            $shippingCompany->created_by  = 1;
            $shippingCompany->updated_by  = 1;
            $shippingCompany->created_at  = \Carbon\Carbon::now();

            $shippingCompany->save();

            //$shippingCompany->saveFakeImage($faker);
        }

    }
}
