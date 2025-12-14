<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

</head>
<body>
    <div class="container">
        
        <div class="profile-header">
            <div class="profile-icon">👤</div>
            <h1 class="profile-name">{{ Auth::user()->name }}</h1>
            <p class="profile-email">{{ Auth::user()->email }}</p>
        </div>

        <div class="card">
            <div class="card-header-gray">Account Information</div>
            <div class="card-body">
                <form>

                    <label for="FullName">Full Name</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="FullName"
                               value="{{ Auth::user()->name }}">
                    </div>

                    <label for="email">Email</label>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email"
                               value="{{ Auth::user()->email }}">
                    </div>
                    
                    <div class="text-center mt-4">
                        <button type="submit" class="btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header-gray">Learning History & Achievements</div>
            <div class="card-body">
                <div class="stat-container">
                    <div class="stat-box">
                        <p class="mb-0 text-sm text-muted">Total Courses Enrolled</p>
                        <h4 class="mb-0">{{ $courses?->count() ?? 0 }}</h4>
                    </div>
                </div>

                <a href="{{ route('MyCourse') }}" class="list-group-item d-flex justify-content-between align-items-center">
                    My Courses
                    <span class="list-group-icon">></span>
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header-gray">Settings and Preferences</div>
            <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center py-3">
                    <div class="d-flex align-items-center">
                        <span class="list-group-icon">🔔</span>
                        <span class="ms-3">App Notification</span>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="d-flex justify-content-between align-items-center py-3">
                    <div class="d-flex align-items-center">
                        <span class="list-group-icon">✉️</span>
                        <span class="ms-3">Subscriptions</span>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="text-center my-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-danger">Log Out</button>
            </form>
        </div>
        <div class="text-center my-4">
            <a href="{{ route('home') }}" class="btn-secondary">Back to Home</  a>
    </div>

</body>
</html>
