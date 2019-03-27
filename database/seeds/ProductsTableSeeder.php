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
      $data = [
          ['id' => 1,
          'category_id' => 1,
          'product_name' => 'White Pillowcase',
          'product_code' => 'BL-STD-PC',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 2,
          'category_id' => 1,
          'product_name' => 'Single Sheet',
          'product_code' => 'BL-STD-SS',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 3,
          'category_id' => 1,
          'product_name' => '70x144 Standard White',
          'product_code' => 'TW-STD-744',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 4,
          'category_id' => 1,
          'product_name' => 'King Sheet',
          'product_code' => 'BL-STD-KS',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 5,
          'category_id' => 1,
          'product_name' => 'Super King Sheet',
          'product_code' => 'BL-STD-SKS',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 6,
          'category_id' => 1,
          'product_name' => 'MS Single Duvet Cover',
          'product_code' => 'BL-STD-SDC',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 7,
          'category_id' => 1,
          'product_name' => 'MS Double Duvet Cover',
          'product_code' => 'BL-STD-DDC',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 8,
          'category_id' => 2,
          'product_name' => 'Double Sheet',
          'product_code' => 'BL-STD-DS',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 9,
          'category_id' => 2,
          'product_name' => '22x22 Standard White',
          'product_code' => 'TW-STD-22',
          'description' => '',
          'image' => '',
          'status' => 1,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],
      ];
      DB::table('products')->insert($data);
    }
}
