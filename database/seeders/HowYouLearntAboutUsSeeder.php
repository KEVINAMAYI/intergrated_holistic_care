<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HowYouLearntAboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('how_you_learnt_about_us')->insert([
            ['how' => 'Facebook','created_at'=>now(),'updated_at'=>now()],
            ['how' => 'Instagram','created_at'=>now(),'updated_at'=>now()],
            ['how' => 'Youtube','created_at'=>now(),'updated_at'=>now()],
            ['how' => 'Schools Website','created_at'=>now(),'updated_at'=>now()],
            ['how' => 'Referral from a friend','created_at'=>now(),'updated_at'=>now()],
            ['how' => 'Walk-In','created_at'=>now(),'updated_at'=>now()],
            ['how' => 'Organizational/Co-corporate events','created_at'=>now(),'updated_at'=>now()],
            ['how' => 'Other','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
