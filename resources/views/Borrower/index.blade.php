@extends('layouts.app')

@section('title', 'Borrower List')

@section('content')
@extends('layouts.head')
<div class="container">
    <div class="row">
        <div class="col-md-1">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-3" id="borrow-container">
                <h2>Borrower List</h2>
                <a href="{{ route('borrowers.create') }}" class="btn btn-success">Create</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Grade</th>
                                <th>Status</th>
                                <th>Borrowed Book</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowers as $key => $borrower)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $borrower->name }}</td>
                                <td>{{ $borrower->phone_number }}</td>
                                <td>{{ $borrower->grade }}</td>
                                <td>{{ $borrower->status }}</td>
                                <td>{{ $borrower->borrowed_book }}</td>
                                <td>{{ $borrower->start_time }}</td>
                                <td>{{ $borrower->end_time }}</td>
                                <td>
                                    <a href="{{ route('borrowers.edit', $borrower->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('borrowers.destroy', $borrower->id) }}" method="POST" style="display:inline;">
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
    </div>
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