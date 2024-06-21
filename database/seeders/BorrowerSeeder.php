<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrower;
use Illuminate\Support\Str;

class BorrowerSeeder extends Seeder
{
    public function run()
    {
        Borrower::create([
            'borrower_id' => Str::uuid(),
            'name' => 'Jane Smith',
            'phone_number' => '0987654321',
            'grade' => 'senior highschool',
            'status' => 'tidak meminjam',
            'start_time' => null,
            'end_time' => null,
        ]);

        // Add more sample data as needed
        Borrower::create([
            'borrower_id' => Str::uuid(),
            'name' => 'Alice Johnson',
            'phone_number' => '1122334455',
            'grade' => 'elementary school',
            'status' => 'meminjam',
            'start_time' => now(),
            'end_time' => now()->addDays(14),
        ]);

        Borrower::create([
            'borrower_id' => Str::uuid(),
            'name' => 'Bob Brown',
            'phone_number' => '2233445566',
            'grade' => 'junior highschool',
            'status' => 'tidak meminjam',
            'start_time' => null,
            'end_time' => null,
        ]);
    }
}