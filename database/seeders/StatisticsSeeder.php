<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('statistics')->insert([
            ['day' => 'SAT', 'borrowers' => 15],
            ['day' => 'SUN', 'borrowers' => 50],
            ['day' => 'MON', 'borrowers' => 30],
            ['day' => 'TUE', 'borrowers' => 75],
            ['day' => 'WED', 'borrowers' => 5],
            ['day' => 'THU', 'borrowers' => 10],
            ['day' => 'FRI', 'borrowers' => 45],
        ]);
    }
}
