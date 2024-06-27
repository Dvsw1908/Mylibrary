@extends('layouts.app')

@section('title', 'Edit Borrower')

@section('content')
@extends('layouts.head')
<div class="container" id="edit-borrower-container">
    <div class="row">
        <div class="col-md-1">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            <h2>Edit Borrower</h2>
            <form action="{{ route('borrowers.update', $borrower->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $borrower->name }}" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $borrower->phone_number }}" required>
                </div>
                <div class="form-group">
                    <label for="grade">Grade</label>
                    <select name="grade" class="form-control" required>
                        <option value="pre-elementary school" {{ $borrower->grade == 'pre-elementary school' ? 'selected' : '' }}>Pre-elementary school</option>
                        <option value="elementary school" {{ $borrower->grade == 'elementary school' ? 'selected' : '' }}>Elementary school</option>
                        <option value="junior highschool" {{ $borrower->grade == 'junior highschool' ? 'selected' : '' }}>Junior highschool</option>
                        <option value="senior highschool" {{ $borrower->grade == 'senior highschool' ? 'selected' : '' }}>Senior highschool</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="meminjam" {{ $borrower->status == 'meminjam' ? 'selected' : '' }}>Meminjam</option>
                        <option value="tidak meminjam" {{ $borrower->status == 'tidak meminjam' ? 'selected' : '' }}>Tidak meminjam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="borrowed_book">Borrowed Book</label>
                    <input type="text" name="borrowed_book" class="form-control" value="{{ $borrower->borrowed_book }}" required>
                </div>
                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="datetime-local" name="start_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($borrower->start_time)) }}" required>
                </div>
                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="datetime-local" name="end_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($borrower->end_time)) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Borrower</button>
            </form>
        </div>
    </div>
</div>
@endsection