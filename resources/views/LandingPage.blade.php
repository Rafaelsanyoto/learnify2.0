@extends('layouts.app')
@section('content')
    <body class="antialiased">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://www.dash-bootstrap-components.com/static/images/slide1.svg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://www.dash-bootstrap-components.com/static/images/slide1.svg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://www.dash-bootstrap-components.com/static/images/slide1.svg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container p-5">
            <div class="input-group mb-3">
                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </div>
        <div class="d-flex align-items-center flex-column p-3">
            <h3>Courses</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 container p-3 d-flex">
                @foreach ($courses as $courseName)
                <div class="col">
                    <div class="card text-bg-dark">
                    <img src="https://www.dash-bootstrap-components.com/static/images/slide1.svg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">{{$courseName}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
@endsection