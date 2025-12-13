<nav class="navbar navbar-expand-lg bg-white navbar-light py-3 shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3 text-primary" href="/">Learnify</a>

        <!-- Menu kiri -->
        <div class="d-none d-lg-flex align-items-center gap-4">
            <a href="{{ route('home') }}" class="nav-link fw-semibold">Home</a>
            <a href="/courses" class="nav-link fw-semibold">Course Catalogue</a>
            <a href="/mycourse" class="nav-link fw-semibold">My Course</a>
        </div>

        <div class="d-flex align-items-center" style="gap: 12px; margin-left: auto;">

            <!-- Language Switcher -->
            <div class="d-flex gap-1">
                <a href="{{ route('lang.switch', 'en') }}"
                   class="btn btn-sm rounded-pill fw-bold {{ app()->getLocale() == 'en' ? 'btn-primary' : 'btn-outline-secondary' }}"
                   style="width: 40px; padding-left: 0; padding-right: 0; text-align: center;">
                    EN
                </a>
                <a href="{{ route('lang.switch', 'id') }}"
                   class="btn btn-sm rounded-pill fw-bold {{ app()->getLocale() == 'id' ? 'btn-primary' : 'btn-outline-secondary' }}"
                   style="width: 40px; padding-left: 0; padding-right: 0; text-align: center;">
                    ID
                </a>
            </div>

            <!-- Filter Form -->
            <form action="{{ route('courses.index') }}" method="GET" id="filterForm" class="d-flex align-items-center">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                <select name="sort" class="form-select rounded-pill px-3" style="width: 150px;" onchange="document.getElementById('filterForm').submit()">
                    <option value="">Filter</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </form>

            <!-- Search Form -->
            <form action="{{ route('courses.index')}}" method="GET" class="d-flex align-items-center gap-2">
                <input name="search" type="text" class="form-control rounded-pill px-3" placeholder="Search..." style="width: 250px;">
                <button class="btn btn-outline-primary rounded-pill px-4 fw-bold">Search</button>
            </form>

            <!-- Auth Buttons -->
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
