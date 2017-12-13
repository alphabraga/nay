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

        $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
        $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
        $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));

        foreach (range(1,50) as $index)
        {
    		
    		$product = new \App\Nay\Model\ProductsModel();

    		$name = $faker->name;

    		$slug = str_slug($name);

    		$tags = [];

    		for ($i=0; $i < 6; $i++)
    		{ 
    			$tags[] = $faker->name;
    		}

            $sale_price     = $faker->randomFloat(2, 50, 400);
            $purchase_price = $faker->randomFloat(2, 50, 400);

            while ($purchase_price > $sale_price)
            {
                $purchase_price = $faker->randomFloat(2, 50, 400);                
            }

			$product->slug             = $slug;
			$product->name             = $name;
			$product->description      = substr($faker->paragraphs(1, true), 0, 100);
			$product->tags             = $tags;
			$product->quantity_limit   = $faker->randomDigit;
			$product->quantity         = $faker->randomDigit;
			$product->sale_price       = $sale_price;
            $product->purchase_price   = $purchase_price;
			$product->created_by       = 1;
			$product->updated_by       = 1;
			$product->created_at       = date('Y-m-d H:i:s');

    		$product->save();

    		//$product->saveFakeImage($faker);
    		//$product->saveFakeImage($faker);
    		//$product->saveFakeImage($faker);
    	}
    }
}
