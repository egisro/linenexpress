<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
            'name' => "Whitout category",
            'status' => 1,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'],

            ['id' => 2,
            'name' => "Bed Linen",
            'status' => 1,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'],

            ['id' => 3,
            'name' => "Table Linen",
            'status' => 1,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'],

            ['id' => 4,
            'name' => "Bath Linen",
            'status' => 1,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'],

            ['id' => 5,
            'name' => "Kichen Linen",
            'status' => 1,
            'created_at' => '2019-03-16 00:00:00',
            'updated_at' => '2019-03-16 00:00:00'],

        ];
        DB::table('categories')->insert($data);
    }
}
