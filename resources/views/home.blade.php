@extends('layouts.app')

@section('title')
{{ env('APP_NAME') }} | MyLibrary
@endsection

@section('content')
@include('layouts.head')
@include('layouts.sidebar')
@include('layouts.navbar')
<div class="content">
    <h1>Hello, <span>{{ Auth::user()->name }}!</span></h1>
    <h3 id="current-time"></h3>
    <div class="content-list">
        <div class="container-content">
            <div class="text-content">
                <h1>{{ $totalBorrowers }}</h1>
                <h6>Total Borrower</h6>
            </div>
            <div class="icon">
                <span class="material-symbols-outlined">person</span>
            </div>    
        </div>
        <div class="container-content">
            <div class="text-content">
                <h1>{{ $totalBorrowedBooks }}</h1>
                <h6>Total Borrowed Books</h6>
            </div>
            <div class="icon">
                <span class="material-symbols-outlined">library_books</span>
            </div>    
        </div>
        <div class="container-content">
            <div class="text-content">
                <h1>{{ $totalOverdueBooks }}</h1>
                <h6>Overdue Books</h6>
            </div>
            <div class="icon">
                <span class="material-symbols-outlined">hourglass</span>
            </div>    
        </div>
    </div>
    <div class="wrap-container">
        <div class="container-list">
            <div class="container-list-header">
                <h2>Books List</h2>
                <a href="{{ route('books.create') }}" class="btn btn-custom">Add New Book</a>
            </div>
            <table>
                <tr>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->amount }}</td>
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
            </table>
            <div class="see-all-container">
                <a href="{{ route('books.index') }}" class="see-all">See All</a>
            </div>
        </div>
        <div class="container-list" id="Borrower">
            <div class="container-list-header">
                <h2>Borrower List</h2>
                <a href="{{ route('borrowers.create') }}" class="btn btn-custom">Add New Borrower</a>
            </div>
            <table>
                <tr>
                    <th>Borrower ID</th>
                    <th>Borrower Name</th>
                    <th>Borrower Phone Number</th>
                    <th>Borrower Status</th>
                    <th>Borrower Grade</th>
                    <th>Action</th>
                </tr>
                @foreach ($borrowers as $borrower)
                <tr>
                    <td>{{ str_pad($borrower->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $borrower->name }}</td>
                    <td>{{ $borrower->phone_number }}</td>
                    <td>{{ $borrower->status }}</td>
                    <td>{{ $borrower->grade }}</td>
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
            </table>
            <div class="see-all-container">
                <a href="{{ route('borrowers.index') }}" class="see-all">See All</a>
            </div>
        </div>
    </div>
    <div class="wrap-container">
        <div class="container-list" id="overdue-books">
            <div class="container-list-header">
                <h2>Overdue Book</h2>
            </div>
            <table>
                <tr>
                    <th>Borrower ID</th>
                    <th>Borrower Name</th>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Overdue</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($overdueBooks as $overdueBook)
                @php
                    $overdueDays = \Carbon\Carbon::now()->diffInDays($overdueBook->end_time);
                @endphp
                <tr>
                    <td>{{ $overdueBook->borrower_id }}</td>
                    <td>{{ $overdueBook->name }}</td>
                    <td>{{ $overdueBook->book->id }}</td>
                    <td>{{ $overdueBook->book->bookname }}</td>
                    <td>{{ $overdueDays }} days</td>
                    <td>{{ $overdueBook->status }}</td>
                    <td>
                        <a href="{{ route('borrowers.edit', $overdueBook->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('borrowers.destroy', $overdueBook->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="see-all-container">
                <a href="#" class="see-all">See All</a>
            </div>
        </div>
        <div class="container-list" id="chart-container">
            <div class="container-list-header">
                <h2>Borrowers Statistics</h2>
            </div>
            <canvas id="borrowerChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('borrowerChart').getContext('2d');
        var borrowerChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
                datasets: [{
                    label: 'Borrowers',
                    data: @json(array_values($borrowersPerDay)),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        function updateTime() {
            var now = new Date();
            
            var optionsDate = { 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric'
            };
            var formattedDate = now.toLocaleDateString('en-US', optionsDate);

            var optionsDay = { 
                weekday: 'long'
            };
            var formattedDay = now.toLocaleDateString('en-US', optionsDay);

            var optionsTime = { 
                hour: '2-digit', 
                minute: '2-digit', 
                hour12: true 
            };
            var formattedTime = now.toLocaleTimeString('en-US', optionsTime);

            document.getElementById('current-time').textContent = `${formattedDate} | ${formattedDay}, ${formattedTime}`;
        }

        updateTime();
        setInterval(updateTime, 1000);
    });
</script>
@endsection