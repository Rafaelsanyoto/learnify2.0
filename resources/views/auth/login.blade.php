@extends('layouts.app')

@section('content')
    

<div class="auth-container">
    <div class="auth-card">
        <h3>Welcome Back!</h3>
        <p>We missed you! Please enter your details.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3 text-left">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
            </div>

            {{-- Password --}}
            <div class="mb-3 text-left">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="d-flex justify-content-between mt-1">
                    <small class="text-muted">
                        <input type="checkbox" class="me-1"> Remember me
                    </small>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-primary" style="font-size: 0.85rem;">
                            Forgot password?
                        </a>
                    @endif
                </div>
            </div>

            {{-- Login Button --}}
            <button type="submit" class="auth-btn mt-3">Sign in</button>
        </form>

        <p class="bottom-text mt-4 mb-0">
            Don't have an account?
            <a href="{{ route('register') }}">Sign up</a>
        </p>

    </div>
</div>

@endsection
