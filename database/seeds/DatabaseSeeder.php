<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(ClientsTableSeeder::class);
        // $this->call(Membership_ProductTableSeeder::class);
        // $this->call(MembershipsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PricesTableSeeder::class);
    }
}
