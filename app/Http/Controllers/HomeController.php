<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;
use App\Models\Borrower;
use Carbon\Carbon;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch all borrowers
        $borrowers = Borrower::all();
        $totalBorrowers = $borrowers->count();

        // Fetch all books
        $books = Book::all();
        $totalBooks = $books->count();

        // Fetch overdue books (assuming there is an 'end_time' column and a 'status' column)
        $overdueBooks = Borrower::where('end_time', '<', Carbon::now())
                                ->where('status', 'meminjam')
                                ->with('book')
                                ->get();
        $totalOverdueBooks = $overdueBooks->count();

        // Statistics (example: total borrowed books)
        $totalBorrowedBooks = Borrower::where('status', 'meminjam')->count();

        // Borrowers count per day of the week
        $borrowersPerDay = Borrower::selectRaw('EXTRACT(DOW FROM created_at) as day, COUNT(*) as count')
                                    ->groupBy('day')
                                    ->pluck('count', 'day')
                                    ->toArray();

        // Fill missing days with 0
        $borrowersPerDay = array_replace([0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0], $borrowersPerDay);

        // Pass the data to the home view
        return view('home', compact('borrowers', 'totalBorrowers', 'books', 'totalBooks', 'overdueBooks', 'totalOverdueBooks', 'totalBorrowedBooks','borrowersPerDay'));
    }
}