<!-- resources/views/auth/login.blade.php -->

@extends('layouts.auth')

@section('content')
<div class="auth-card">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert" id="success-alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="logo">
            <img src="{{ asset('assets/logo_Mylibrary.png') }}" alt="logo">
        </div>
        <h4>Welcome to MyLibrary!</h4>
        <div class="welcome-message">
            <p id="teks-pertama">Please log in to continue</p>
            <p id="teks-terakhir">accessing your personalized library experience</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group" id="password-field">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-block">
                    Login
                </button>
            </div>

            <div class="text-center mt-3">
                Need an account? <a href="{{ route('register') }}">Register here</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            let alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 3000); // 3 seconds
    });
</script>
@endsection