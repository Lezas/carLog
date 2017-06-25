<?php

use Illuminate\Database\Seeder;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'id' => 101,
            'name' => 'Auto No. 1',
            'brand' => 'Audi',
            'model' => 'A4',
            'power' => 156,
            'drive_train' => 'AWD',
            'user_id' => '5',
            'mileage' => '312569',
            'birth_day' => '2002-02-02',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'photo' => 'car1.png',
        ]);
        DB::table('cars')->insert([
            'id' => 102,
            'name' => 'Auto No. 2',
            'brand' => 'BMV',
            'model' => 'e46',
            'power' => 156,
            'drive_train' => 'RWD',
            'user_id' => '5',
            'mileage' => '212869',
            'birth_day' => '2003-02-02',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'photo' => 'car2.jpg',
        ]);
    }
}
