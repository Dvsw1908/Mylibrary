<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrower;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Borrower::create([
            'name' => 'John Doe',
            'phone_number' => '123-456-7890',
            'grade' => 'junior highschool',
            'status' => 'meminjam',
            'borrowed_book' => 'Mathematics 101',
            'start_time' => now(),
            'end_time' => now()->addDays(7),
        ]);

        Borrower::create([
            'name' => 'Jane Smith',
            'phone_number' => '987-654-3210',
            'grade' => 'senior highschool',
            'status' => 'tidak meminjam',
            'borrowed_book' => 'Physics 201',
            'start_time' => now(),
            'end_time' => now()->addDays(14),
        ]);
    }
}