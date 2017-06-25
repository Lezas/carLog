<?php

use Illuminate\Database\Seeder;

class RemindersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reminders')->insert([
            'id' => 11,
            'name' => 'Oil Change',
            'date_interval' => '365',
            'mileage_interval' => '10000',
            'last_service_id' => 55,
            'car_id' => 101,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'next_service_date' => '2018-06-25',
            'next_service_mileage' => '335268',
        ]);
        DB::table('reminders')->insert([
            'id' => 12,
            'name' => 'Tire swap',
            'date_interval' => '180',
            'mileage_interval' => '5000',
            'car_id' => 101,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'next_service_date' => '2017-09-01',
            'next_service_mileage' => '330000',
        ]);
        DB::table('reminders')->insert([
            'id' => 13,
            'name' => 'Air filter change',
            'date_interval' => '365',
            'mileage_interval' => '20000',
            'last_service_id' => 57,
            'car_id' => 101,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'next_service_date' => '2017-09-01',
            'next_service_mileage' => '310000',
        ]);
    }
}
