<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$faker = \Faker\Factory::create();

    	for ($i=0; $i <= 100; $i++)
    	{ 
    		
    		$product = new \App\Nay\Model\ProductsModel();

    		$name = $faker->name;

    		$slug = str_slug($name);

    		$tags = [];

    		for ($i=0; $i < 6; $i++)
    		{ 
    			$tags[] = $faker->name;
    		}

			$product->slug             = $slug;
			$product->name             = $name;
			$product->description      = $faker->paragraphs(3, true) ;
			$product->tags             = $tags;
			$product->quantity_limit   = $faker->randomDigit;
			$product->quantity         = $faker->randomDigit;
			$product->price            = $faker->randomFloat(2);
			$product->created_by       = 1;
			$product->updated_by       = 1;
			$product->created_at       = date('Y-m-d H:i:s');

    		$product->save();

    		$product->saveFakeImage($faker);
    		$product->saveFakeImage($faker);
		    $product->saveFakeImage($faker);
    	}
    }
}
