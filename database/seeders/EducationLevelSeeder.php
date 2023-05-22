<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('education_level')->insert([
            ['level' => 'KCSE', 'created_at' => now(), 'updated_at' => now()],
            ['level' => 'Certificate', 'created_at' => now(), 'updated_at' => now()],
            ['level' => 'Diploma', 'created_at' => now(), 'updated_at' => now()],
            ['level' => 'Degree', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
