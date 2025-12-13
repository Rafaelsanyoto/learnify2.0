<nav class="navbar navbar-expand-lg bg-white navbar-light py-3 shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3 text-primary" href="/">Learnify</a>

        <!-- Menu kiri -->
        <div class="d-none d-lg-flex align-items-center gap-4">
            <a href="/" class="nav-link fw-semibold">Home</a>
            <a href="/courses" class="nav-link fw-semibold">Course Catalogue</a>
            <a href="/mycourse" class="nav-link fw-semibold">My Course</a>
        </div>

        <div class="d-flex align-items-center" style="gap: 12px; margin-left: auto;">

            <select class="form-select rounded-pill px-3" style="width: 150px;">
                <option>Filter</option>
                <option>Low to High</option>
                <option>High</option>
            </select>

            <!-- Search dekat Login -->
            <form action="{{ route('courses.index')}}" method="GET" class="d-flex align-items-center gap-2">
            <input name="search" type="text" class="form-control rounded-pill px-3" placeholder="Search..."
                style="width: 250px;">
            <button class="btn  rounded-pill px-4 fw-bold"> Search</button>
            </form>
            <!-- Login -->
            @guest
                <a href="/login" class="btn btn-outline-primary rounded-pill px-4 fw-bold">
                    Login
                </a>
            @endguest

            @auth
                <a href="/profile" class="btn btn-primary rounded-pill px-4 fw-bold">
                    {{ Auth::user()->name }}
                </a>
            @endauth


        </div>

    </div>
</nav>
