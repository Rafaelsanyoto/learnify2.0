@extends('layout.app')

@section('content')

<div class="container py-5">
    <h1 class="mb-4 text-center">{{ __('messages.my_course') }}</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <div class="row g-4">

        @forelse($courses as $course)
            <div class="col-12">
                <div class="card shadow-sm flex-row align-items-center p-3">

                    <img src="{{ asset($course->image ?? 'webdev.png') }}"
                         class="card-img-left rounded"
                         style="width: 120px; height: auto;"
                         alt="{{ $course->title }}"
                         onerror="this.src='{{ asset('webdev.png') }}'">

                    <div class="card-body flex-grow-1 ms-3">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text mb-1">
                            <small class="text-muted">
                                {{ __('messages.enrolled_at') }} {{ $course->pivot->created_at?->format('d M Y') ?? 'N/A' }}
                            </small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                {{ __('messages.last_updated') }} {{ $course->updated_at?->diffForHumans() ?? 'N/A' }}
                            </small>
                        </p>
                    </div>

                    <div class="ms-auto text-center">
                        <a href="{{ route('mycourse.details', $course) }}" class="apply-btn">
                            {{ __('messages.continue') }}
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted py-5">
                {{ __('messages.no_enrolled') }}
            </div>
        @endforelse

    </div>
</div>

@endsection
