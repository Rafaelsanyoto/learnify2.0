@extends('layout.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/coursecatalog.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-white text-gray-700 antialiased">

<div class="min-h-screen p-6">

    <header class="bg-gray-200 rounded-b px-6 py-4 mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-medium text-center w-full">
            {{ __('messages.course_catalogue') }}
        </h1>

        <a href="{{ route('courses.create') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 text-sm font-bold whitespace-nowrap ml-4">
            + {{ __('messages.new_course') }}
        </a>

        <div class="w-6 h-6 bg-white border rounded shadow-sm ml-4"></div>
    </header>

    @if(session('success'))
            <div class="alert alert-success" style="color: green; padding: 10px; background: #e6fffa; border: 1px solid green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" style="color: red; padding: 10px; background: #ffe6e6; border: 1px solid red; margin-bottom: 10px;">
                {{ session('error') }}
            </div>
        @endif

    <div class="card-list">

        @forelse(($courses ?? []) as $course)
            <div class="course-card">
                <div class="thumb-wrapper">
                    <img
                        src="{{ asset($course->image ?? 'webdev.png') }}"
                        alt="{{ $course->title }}"
                        class="thumb"
                        onerror="this.src='{{ asset('webdev.png') }}'">
                </div>

                <div class="content">

                    <div class="top-row">
                        <div>
                            <h3 class="title">{{ $course->title }}</h3>

                            <div class="rating-price">
                                <div class="rating">
                                    <span class="star">★</span>
                                    <span>{{ number_format($course->rating ?? 0, 1) }}</span>
                                </div>
                                <div class="price">Rp {{ number_format($course->price ?? 0, 0, ',', '.') }}</div>
                            </div>
                        </div>

                        <div class="apply-wrapper">
                            <form action="{{ route('courses.apply', $course->id) }}" method="POST">
                                                        @csrf
                                <button type="submit" class="apply-btn">
                                    {{ __('messages.apply') }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="desc">
                        {!! nl2br(e($course->description ?? 'Course description not available.')) !!}
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="text-xs font-bold text-gray-400 uppercase">
                            {{ __('messages.admin') }}
                        </span>
                        <div class="flex gap-2">
                            <a href="{{ route('courses.edit', $course->id) }}" class="text-xs bg-yellow-100 text-yellow-700 px-3 py-1 rounded hover:bg-yellow-200 transition">
                                {{ __('messages.edit') }}
                            </a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('{{ __('messages.confirm_delete') }}');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200 transition">
                                    {{ __('messages.delete') }}
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        @empty
            <div class="text-center text-gray-500 w-full py-10">
                {{ __('messages.no_courses') }}
            </div>
        @endforelse

    </div>
</div>

</body>
@endsection
