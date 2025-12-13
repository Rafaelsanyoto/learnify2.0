@extends('layout.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif
        <div class="col-lg-8">
            <div class="text-center mb-4">
                <h1 class="fw-bold">{{ $course->title }}</h1>
            </div>


             <div class="text-center mb-4">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="{{ $course->links }}"
                        title="YouTube video"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>




            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Question 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" id="q1-option1">
                                <label class="form-check-label" for="q1-option1">
                                    A
                                </label>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" id="q1-option2">
                                <label class="form-check-label" for="q1-option2">
                                    B
                                </label>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q1" id="q1-option3">
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
                    <h5 class="card-title fw-bold">Question 2</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" id="q2-option1">
                                <label class="form-check-label" for="q2-option1">Option 1</label>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" id="q2-option2">
                                <label class="form-check-label" for="q2-option2">Option 2</label>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="q2" id="q2-option3">
                                <label class="form-check-label" for="q2-option3">Option 3</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Submit</button>
            </div>
        </div>
    </div>
</div>

@endsection


