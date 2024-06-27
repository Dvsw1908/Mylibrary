<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowers = Borrower::all();
        return view('Borrower.index', compact('borrowers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Borrower.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required|regex:/^[0-9-]+$/|min:11|max:16',
            'grade' => 'required|in:pre-elementary school,elementary school,junior highschool,senior highschool',
            // 'status' => 'required|in:meminjam,tidak meminjam',
            'borrowed_book' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        $validatedData['status'] = 'meminjam';

        Borrower::create($validatedData);

        return redirect()->route('borrowers.index')->with('success', 'Borrower created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrower $borrower)
    {
        return view('Borrower.edit', compact('borrower'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrower $borrower)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required|regex:/^[0-9-]+$/|min:11|max:16',
            'grade' => 'required|in:pre-elementary school,elementary school,junior highschool,senior highschool',
            'status' => 'required|in:meminjam,tidak meminjam',
            'borrowed_book' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        $borrower->update($validatedData);

        return redirect()->route('borrowers.index')->with('success', 'Borrower updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrower $borrower)
    {
        $borrower->delete();

        return redirect()->route('borrowers.index')->with('success', 'Borrower deleted successfully.');
    }
}
