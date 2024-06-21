<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = Borrower::all();
        return view('Borrower.index', compact('borrowers'));
    }

    public function create()
    {
        return view('Borrower.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|digits_between:11,13', // Validasi panjang nomor telepon
            'grade' => 'required|in:pre-elementary school,elementary school,junior highschool,senior highschool',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date',
        ]);

        // Generate borrower_id
        $lastBorrower = Borrower::orderBy('id', 'desc')->first();
        $lastId = $lastBorrower ? intval(substr($lastBorrower->borrower_id, 2)) : 0;
        $newId = 'br' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        $borrower = new Borrower();
        $borrower->borrower_id = $newId;
        $borrower->name = $request->name;
        $borrower->phone_number = $request->phone_number;
        $borrower->grade = $request->grade;
        $borrower->status = 'meminjam'; // Set status to "meminjam"
        $borrower->start_time = $request->start_time;
        $borrower->end_time = $request->end_time;
        $borrower->save();

        return redirect()->route('borrowers.index')->with('success', 'Borrower has been successfully added.');
    }

    public function edit(Borrower $borrower)
    {
        return view('Borrower.edit', compact('borrower'));
    }

    public function update(Request $request, Borrower $borrower)
    {
        $request->validate([
            'borrower_id' => 'required|unique:borrowers,borrower_id,' . $borrower->id,
            'name' => 'required',
            'phone_number' => 'required|digits_between:11,13', // Validasi panjang nomor telepon
            'grade' => 'required|in:pre-elementary school,elementary school,junior highschool,senior highschool',
            'status' => 'required|in:meminjam,tidak meminjam',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date',
        ]);

        $borrower->update($request->all());

        return redirect()->route('borrowers.index')->with('success', 'Borrower updated successfully.');
    }

    public function destroy(Borrower $borrower)
    {
        $borrower->delete();

        return redirect()->route('borrowers.index')->with('success', 'Borrower deleted successfully.');
    }
}