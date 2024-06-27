@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
@extends('layouts.head')
@include('layouts.sidebar')
<div class="container" id="book-index-container">
    <h1>Add Book</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="bookname">Book Name</label>
            <input type="text" name="bookname" class="form-control" id="bookname">
        </div>
        <div class="form-group">
            <label for="booktype">Book Type</label>
            <input type="text" name="booktype" class="form-control" id="booktype">
        </div>
        <div class="form-group">
            <label for="bookamount">Book Amount</label>
            <input type="number" name="bookamount" class="form-control" id="bookamount">
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
@endsection