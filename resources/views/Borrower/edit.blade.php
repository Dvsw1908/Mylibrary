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
                    <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                    <small id="phone_number_error" class="text-danger d-none">Phone number must be between 11 and 13 digits.</small>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const phoneNumberInput = document.getElementById('phone_number');
        const borrowerForm = document.getElementById('borrowerForm');
        const phoneNumberError = document.getElementById('phone_number_error');

        phoneNumberInput.addEventListener('input', function(event) {
            let value = phoneNumberInput.value.replace(/-/g, ''); // Remove existing dashes

            // Only allow numbers
            value = value.replace(/\D/g, '');

            if (value.length > 13) {
                phoneNumberError.classList.remove('d-none');
                value = value.slice(0, 13);
            } else {
                phoneNumberError.classList.add('d-none');
            }

            // Add dashes every 4 digits
            let formattedValue = '';
            for (let i = 0; i < value.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedValue += '-';
                }
                formattedValue += value[i];
            }

            phoneNumberInput.value = formattedValue;
        });

        borrowerForm.addEventListener('submit', function(event) {
            const phoneNumber = phoneNumberInput.value.replace(/-/g, ''); // Remove dashes for validation
            if (phoneNumber.length < 11 || phoneNumber.length > 13) {
                event.preventDefault();
                phoneNumberError.classList.remove('d-none');
            } else {
                phoneNumberError.classList.add('d-none');
            }
        });
    });
</script>
@endsection