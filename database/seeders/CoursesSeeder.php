<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            ['title' => 'Professional Care Giving', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Autism', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Basic Life Support', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
