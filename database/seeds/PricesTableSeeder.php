<?php

use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $membership_count = 4;
      $product_count = 9;
      for ($i = 1; $i < $product_count+1; $i++){
          $data = [

            ];
          }
      DB::table('prices')->insert($data);
    }
}
