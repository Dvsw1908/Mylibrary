@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            <h2>Add New Book</h2>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input type="text" name="bookname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="book_type">Book Type</label>
                    <input type="text" name="book_type" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="book_amount">Book Amount</label>
                    <input type="number" name="book_amount" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
        </div>
    </div>
</div>
@endsection