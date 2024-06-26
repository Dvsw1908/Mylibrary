@extends('layouts.app')

@section('title')
{{ env('APP_NAME') }}
@endsection 

@section('content')
@extends('layouts.head')
<div class="container-fluid" id="create-borrower-container">
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
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2>Add New Borrower</h2>
            <form id="borrowerForm" action="{{ route('borrowers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                    <small id="phone_number_error" class="text-danger d-none">Phone number must be between 11 and 13 digits.</small>
                </div>
                <div class="form-group">
                    <label for="grade">Grade</label>
                    <select name="grade" class="form-control" required>
                        <option value="pre-elementary school">Pre-elementary school</option>
                        <option value="elementary school">Elementary school</option>
                        <option value="junior highschool">Junior highschool</option>
                        <option value="senior highschool">Senior highschool</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="borrowed_book">Borrowed Book</label>
                    <input type="text" name="borrowed_book" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="datetime-local" name="start_time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="datetime-local" name="end_time" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Borrower</button>
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