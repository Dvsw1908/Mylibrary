@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Book List</h2>
                <a href="{{ route('books.create') }}" class="btn btn-success">Create</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Name</th>
                        <th>Book Type</th>
                        <th>Book Amount</th>
                        <th>Book Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $key => $book)
                    @php
                        $borrowedCount = \App\Models\Borrower::where('book_id', $book->id)
                            ->where('status', 'meminjam')
                            ->count();
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $book->bookname }}</td>
                        <td>{{ $book->book_type }}</td>
                        <td>{{ $book->book_amount }}</td>
                        <td>{{ $borrowedCount }} borrowed</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection