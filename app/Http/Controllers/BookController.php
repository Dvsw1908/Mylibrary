<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('Book.index', compact('books'));
    }

    public function create()
    {
        return view('Book.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bookname' => 'required',
            'booktype' => 'required',
            'bookamount' => 'required|numeric',
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        return view('Book.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'bookname' => 'required',
            'booktype' => 'required',
            'bookamount' => 'required|numeric',
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}