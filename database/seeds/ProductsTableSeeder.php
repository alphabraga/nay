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
            $product->barcode          = $faker->ean13;
            $product->external_code    = $faker->randomNumber(9);
			$product->name             = $name;
			$product->description      = substr($faker->paragraphs(1, true), 0, 100);
			$product->tags             = $tags;
			$product->quantity_limit   = $faker->randomDigit;
			$product->quantity         = $faker->randomDigit;
			$product->sale_price       = $sale_price;
            $product->purchase_price   = $purchase_price;
            $product->custom_field1    = $faker->randomNumber(2);
            $product->custom_field2    = $faker->name;
            $product->custom_field3    = $faker->title;
            $product->custom_field4    = $faker->postcode;
            $product->custom_field5    = $faker->titleFemale;
            $product->custom_field6    = $faker->randomNumber(1);
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
