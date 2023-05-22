<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferredTimeOfClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('preferred_time_of_class')->insert([
            ['time' => 'E-Learning', 'created_at' => now(), 'updated_at' => now()],
            ['time' => 'Morning Weekdays', 'created_at' => now(), 'updated_at' => now()],
            ['time' => 'Afternoon Weekdays', 'created_at' => now(), 'updated_at' => now()],
            ['time' => 'Evening Saturdays', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
