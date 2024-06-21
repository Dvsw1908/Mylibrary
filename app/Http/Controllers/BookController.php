<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrower;

class BookController extends Controller
{
    public function index()
    {
        \Log::info('BookController index method called'); // Debugging
        $books = Book::all();
        \Log::info('Books:', $books->toArray()); // Debugging
        return view('books.index', compact('books'));
    }
    

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bookname' => 'required',
            'book_type' => 'required',
            'book_amount' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'bookname' => 'required',
            'book_type' => 'required',
            'book_amount' => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}