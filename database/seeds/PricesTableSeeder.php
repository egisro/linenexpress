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
      $prices = [];
      $n = 1;
      for ($i = 1; $i < $product_count+1; $i++){
        $price = mt_rand(5, 55);

            $prices[] =[
            'id' => $n,
            'product_id' => $i,
            'membership_id' => 1,
            'price' => $price,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'];
$n=$n + 1;
            $prices[] =[
            'id' => $n,
            'product_id' => $i,
            'membership_id' => 2,
            'price' => $price - 0.26,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'];
$n=$n + 1;
            $prices[] =[
            'id' => $n,
            'product_id' => $i,
            'membership_id' => 3,
            'price' => $price - 0.73,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'];
$n=$n + 1;
            $prices[] =[
            'id' => $n,
            'product_id' => $i,
            'membership_id' => 4,
            'price' => $price - 1.14,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'];
$n=$n + 1;
          }
      DB::table('prices')->insert($prices);
    }
}
