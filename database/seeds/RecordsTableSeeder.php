<?php

use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([
            'id' => 55,
            'name' => 'Oil Change',
            'date' => '2017-02-10',
            'service_id' => 1,
            'car_id' => 101,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'mileage' => '310000',
            'labor_cost' => '0',
            'parts_cost' => '25',

        ]);
        DB::table('records')->insert([
            'id' => 56,
            'name' => 'Oil Change',
            'date' => '2017-06-25',
            'car_id' => 101,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'mileage' => '325268',
            'labor_cost' => '0',
            'parts_cost' => '35',
        ]);
        DB::table('records')->insert([
            'id' => 57,
            'name' => 'Air filter Change',
            'date' => '2017-06-25',
            'service_id' => 13,
            'car_id' => 101,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'mileage' => '290000',
            'labor_cost' => '0',
            'parts_cost' => '5',
        ]);
    }
}
