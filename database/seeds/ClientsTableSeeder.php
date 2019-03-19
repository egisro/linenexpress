<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
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
          'name' => 'Darius',
          'address' => 'Apuoku g. 25',
          'membership_id' => 2,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 2,
          'name' => 'Egidijus',
          'address' => 'Antakalnio g. 5',
          'membership_id' => 3,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 3,
          'name' => 'Jonis',
          'address' => 'Žirmūnų g. 16',
          'membership_id' => 2,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],

          ['id' => 4,
          'name' => 'Petriukas',
          'address' => 'Nežiniukų g. 8',
          'membership_id' => 4,
          'created_at' => '2019-03-16 00:00:00',
          'updated_at' => '2019-03-16 00:00:00'],
      ];
      DB::table('clients')->insert($data);
    }
}
