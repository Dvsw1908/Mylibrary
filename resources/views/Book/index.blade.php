@extends('layouts.app')

@section('title', 'Book List')

@section('content')
@extends('layouts.head')
@include('layouts.sidebar')
<div class="container" id="book-index-container">
    <h1>Book List</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add Book</a>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Book Type</th>
                <th>Book Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $key => $book)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $book->bookname }}</td>
                <td>{{ $book->booktype }}</td>
                <td>{{ $book->bookamount }}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(function() {
                    alert.remove();
                }, 500); // Waktu untuk animasi fade out
            }
        }, 3000); // Waktu dalam milidetik (3 detik)
    });
</script>
@endsection