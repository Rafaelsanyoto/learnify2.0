@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card">

        <h3>Create Your Account</h3>
        <p>Join us and start your journey today.</p>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div class="mb-3 text-left">
                <label class="form-label">Full Name</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    value="{{ old('name') }}" 
                    placeholder="Enter your full name" 
                    required>
            </div>

            {{-- Email --}}
            <div class="mb-3 text-left">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    value="{{ old('email') }}" 
                    placeholder="Enter your email" 
                    required>
            </div>

            {{-- Password --}}
            <div class="mb-3 text-left">
                <label class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Create a password" 
                    required>
            </div>

            {{-- Confirm Password --}}
            <div class="mb-3 text-left">
                <label class="form-label">Confirm Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control" 
                    placeholder="Re-enter your password" 
                    required>
            </div>

            {{-- Agreement --}}
            <div class="mb-3">
                <label class="form-check-label">
                    <input type="checkbox" name="agreement" class="form-check-input" required>
                    I agree to the Terms and Conditions
                </label>
            </div>

            {{-- Register Button --}}
            <button type="submit" class="auth-btn mt-3">Sign up</button>
        </form>

        <p class="bottom-text mt-4 mb-0">
            Already have an account?
            <a href="{{ route('login') }}">Sign in</a>
        </p>

    </div>
</div>
@endsection
