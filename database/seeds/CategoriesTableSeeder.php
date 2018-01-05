<?php

use Illuminate\Database\Seeder;

class CategoriesTableSedder extends Seeder
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


        foreach (range(1,15) as $index)
        {
            $category = new \App\Nay\Model\CategoriesModel();

    		$name = $faker->name;

    		$slug = str_slug($name);

			$category->name          = $faker->name;
            $category->color         = $faker->hexcolor;
			$category->slug          = $slug;			
			$category->description   = substr($faker->paragraphs(1, true), 0, 100);
			$category->level         = 1;
			$category->category_id   = null;
			$category->tags          = [$faker->name, $faker->name];
            $category->created_by  = 1;
            $category->updated_by  = 1;
            $category->deleted_by  = 1;
            $category->created_at  = \Carbon\Carbon::now();

            $category->save();
        }

    }
}
