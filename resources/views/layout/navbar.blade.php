<nav class="navbar navbar-expand-lg bg-white navbar-light py-3 shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3 text-primary" href="/">Learnify</a>

        <!-- Menu kiri -->
        <div class="d-none d-lg-flex align-items-center gap-4">
            <a href="{{ route('home') }}" class="nav-link fw-semibold">
                {{ __('messages.home') }}
            </a>
            <a href="/courses" class="nav-link fw-semibold">
                {{ __('messages.course_catalogue') }}
            </a>
            <a href="/mycourse" class="nav-link fw-semibold">
                {{ __('messages.my_course') }}
            </a>
        </div>

        <div class="d-flex align-items-center" style="gap: 12px; margin-left: auto;">

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


            <form action="{{ route('courses.index')}}" method="GET" class="d-flex align-items-center gap-2">
                <input name="search" type="text" class="form-control rounded-pill px-3"
                       placeholder="{{ __('messages.search_placeholder') }}" style="width: 250px;">
                <button class="btn btn-outline-primary rounded-pill px-4 fw-bold">
                    {{ __('messages.search') }}
                </button>
            </form>

            @guest
                <a href="/login" class="btn btn-outline-primary rounded-pill px-4 fw-bold">
                    {{ __('messages.login') }}
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
