<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
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
    		
    		$brand = new \App\Nay\Model\BrandsModel();

    		$name = $faker->name;

    		$slug = str_slug($name);

    		$tags = [];

    		for ($i=0; $i < 6; $i++)
    		{ 
    			$tags[] = $faker->name;
    		}

            $provider = \App\Nay\Model\EntitiesModel::inRandomOrder()->first();

			$brand->slug             = $slug;
			$brand->name             = $name;
			$brand->description      = substr($faker->paragraphs(1, true), 0, 100);
			$brand->tags             = $tags;
            $brand->color            = $faker->hexcolor;
			$brand->created_by       = 1;
			$brand->updated_by       = 1;
			$brand->created_at       = date('Y-m-d H:i:s');
            $brand->entity_id        = $provider->id;   

    		$brand->save();

    		//$brand->saveFakeImage($faker);
    	}
    }
}
