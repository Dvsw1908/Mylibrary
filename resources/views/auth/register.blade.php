<!-- resources/views/auth/register.blade.php -->

@extends('layouts.auth')

@section('content')
<div class="auth-card">
    <div class="card-body">
        <div class="logo">
            <img src="{{ asset('assets/logo_Mylibrary.png') }}" alt="logo">
        </div>
        <h4>Register your account to continue</h4>
        <div class="welcome-message">
            <p id="teks-pertama">Create an account to start</p>
            <p id="teks-terakhir">accessing your personalized library experience</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-block">
                    Register
                </button>
            </div>

            <div class="text-center mt-3">
                Already have an account? <a href="{{ route('login') }}">Log in here</a>
            </div>
        </form>
    </div>
</div>
@endsection