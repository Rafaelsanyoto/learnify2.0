@extends('layout.app')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0;
        border-radius: 0 0 50px 50px;
        margin-top: -1.5rem;
        margin-bottom: 3rem;
    }
</style>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Welcome to Learnify</h1>
        <p class="lead opacity-90">
            Simplify your learning journey.
        </p>
    </div>
</div>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success text-center mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You have logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
