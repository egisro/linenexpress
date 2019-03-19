<?php

use Illuminate\Database\Seeder;

class Membership_ProductTableSeeder extends Seeder
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
      $data = [];
      $n = 1;
      for ($i = 1; $i < $product_count+1; $i++){
          $data[] =
              ['id' => $n,
              'membership_id' => 1,
              'product_id' => $i,
              'created_at' => '2019-03-16 00:00:00',
              'updated_at' => '2019-03-16 00:00:00'];
$n = $n + 1;
          $data[] =
              ['id' => $n,
              'membership_id' => 2,
              'product_id' => $i,
              'created_at' => '2019-03-16 00:00:00',
              'updated_at' => '2019-03-16 00:00:00'];
$n = $n + 1;
          $data[] =
              ['id' => $n,
              'membership_id' => 3,
              'product_id' => $i,
              'created_at' => '2019-03-16 00:00:00',
              'updated_at' => '2019-03-16 00:00:00'];
$n = $n + 1;
          $data[] =
              ['id' => $n,
              'membership_id' => 4,
              'product_id' => $i,
              'created_at' => '2019-03-16 00:00:00',
              'updated_at' => '2019-03-16 00:00:00'];
$n = $n + 1;
          }
      DB::table('membership_product')->insert($data);
    }
}
