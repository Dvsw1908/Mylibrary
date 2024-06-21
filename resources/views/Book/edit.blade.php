@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            <h2>Edit Book</h2>
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input type="text" name="bookname" class="form-control" value="{{ $book->bookname }}" required>
                </div>
                <div class="form-group">
                    <label for="book_type">Book Type</label>
                    <input type="text" name="book_type" class="form-control" value="{{ $book->book_type }}" required>
                </div>
                <div class="form-group">
                    <label for="book_amount">Book Amount</label>
                    <input type="number" name="book_amount" class="form-control" value="{{ $book->book_amount }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Book</button>
            </form>
        </div>
    </div>
</div>
@endsection