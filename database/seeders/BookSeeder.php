<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create(['bookname' => 'Book 1', 'booktype' => 'Fiction', 'bookamount' => 10]);
        Book::create(['bookname' => 'Book 2', 'booktype' => 'Non-fiction', 'bookamount' => 5]);
        Book::create(['bookname' => 'Book 3', 'booktype' => 'Science', 'bookamount' => 7]);
        Book::create(['bookname' => 'Book 4', 'booktype' => 'History', 'bookamount' => 12]);
        Book::create(['bookname' => 'Book 5', 'booktype' => 'Biography', 'bookamount' => 8]);
    }
}