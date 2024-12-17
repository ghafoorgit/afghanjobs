<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Website</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        .navbar-brand {
            font-weight: bold;
        }
        /* Underline nav links on hover */
        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">Afghan Jobs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/jobs') }}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/contact-us') }}">Contact Us</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        {{ $slot }}
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
