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

    	for ($i=0; $i <= 10; $i++)
    	{ 
    		
    		$brand = new \App\Nay\Model\BrandsModel();

    		$name = $faker->name;

    		$slug = str_slug($name);

    		$tags = [];

    		for ($i=0; $i < 6; $i++)
    		{ 
    			$tags[] = $faker->name;
    		}

			$brand->slug             = $slug;
			$brand->name             = $name;
			$brand->description      = $faker->paragraphs(3, true);
			$brand->tags             = $tags;
			$brand->created_by       = 1;
			$brand->updated_by       = 1;
			$brand->created_at       = date('Y-m-d H:i:s');

    		$brand->save();

    		$brand->saveFakeImage($faker);
    	}
    }
}
