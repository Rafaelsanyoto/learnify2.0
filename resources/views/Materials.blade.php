@extends('layout.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-lg-8">

            {{-- TITLE --}}
            <div class="text-center mb-3">
                <h1 class="fw-bold">{{ $course->title }}</h1>
            </div>

            {{-- ⭐ STAR RATING --}}
            <div class="text-center mb-4">
                <div id="stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star"
                              data-value="{{ $i }}"
                              style="font-size:28px; cursor:pointer; color:#d1d5db;">
                            ★
                        </span>
                    @endfor
                </div>

                <input type="hidden" id="ratingValue" value="0">

                <div class="text-muted mt-1">
                    Rating: <span id="ratingText">0</span>/5
                </div>
            </div>

            {{-- VIDEO --}}
            <div class="text-center mb-4">
                <div class="ratio ratio-16x9">
                    <iframe src="{{ $course->links }}" allowfullscreen></iframe>
                </div>
            </div>

            {{-- FORM --}}
            <form action="{{ route('course.submit', $course->id) }}" method="POST">
                @csrf

                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ __('messages.question') }} 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1-option1" value="A">
                                    <label class="form-check-label" for="q1-option1">
                                        A
                                    </label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1-option2" value="B">
                                    <label class="form-check-label" for="q1-option2">
                                        B
                                    </label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1-option3" value="C">
                                    <label class="form-check-label" for="q1-option3">
                                        C
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ __('messages.question') }} 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2-option1" value="A">
                                    <label class="form-check-label" for="q2-option1">A</label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2-option2" value="B">
                                    <label class="form-check-label" for="q2-option2">B</label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2-option3" value="C">
                                    <label class="form-check-label" for="q2-option3">C</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">{{ __('messages.submit_btn') }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('ratingValue');
    const ratingText = document.getElementById('ratingText');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const value = this.dataset.value;
            ratingInput.value = value;
            ratingText.innerText = value;

            stars.forEach(s => {
                s.style.color =
                    s.dataset.value <= value ? '#facc15' : '#d1d5db';
            });
        });
    });
});
</script>

@endsection
