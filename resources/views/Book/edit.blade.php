@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
@extends('layouts.head')
@include('layouts.sidebar')
<div class="container" id="book-index-container">
    <h1>Edit Book</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="bookname">Book Name</label>
            <input type="text" name="bookname" class="form-control" id="bookname" value="{{ $book->bookname }}">
        </div>
        <div class="form-group">
            <label for="booktype">Book Type</label>
            <input type="text" name="booktype" class="form-control" id="booktype" value="{{ $book->booktype }}">
        </div>
        <div class="form-group">
            <label for="bookamount">Book Amount</label>
            <input type="number" name="bookamount" class="form-control" id="bookamount" value="{{ $book->bookamount }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
</div>
@endsection