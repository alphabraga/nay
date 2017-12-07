<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(ConfigurationTableSeeder::class);
        //$this->call(UserTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ClientsTableSedder::class);
        $this->call(CategoriesTableSedder::class);
        $this->call(ShippingCompanyTableSeeder::class);
    }
}
