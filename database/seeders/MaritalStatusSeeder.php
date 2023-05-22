<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('marital_statuses')->insert([
            ['status' => 'Single', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Married', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Devorced', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Widow', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Other', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
