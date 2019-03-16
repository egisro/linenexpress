<?php

use Illuminate\Database\Seeder;

class MembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $memberships = [
          ['id' => 1,
          'name' => "Standart",
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 2,
          'name' => "Silver",
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 3,
          'name' => "Gold",
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 4,
          'name' => "Diamond",
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],
      ];
      DB::table('memberships')->insert($memberships);
    }
}
