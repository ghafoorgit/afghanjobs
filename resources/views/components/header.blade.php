<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="min-height: 80px; background-color: #2973B2;">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">Afghan Jobs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto" style="width: 50%;"> <!-- Centering the search bar -->
                <li class="nav-item w-100">
                    <form class="d-flex w-100" action="{{ url('/search') }}" method="GET">
                        <input class="form-control me-2 flex-grow-1" type="search" placeholder="Search job title" aria-label="Search" name="query">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">Jobs</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/jobs') }}">Job Management</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/contact-us') }}">Contact Us</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Access Control</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/users') }}">Users</a></li>
                        <li><a class="dropdown-item" href="{{ url('/roles') }}">Roles</a></li>
                        <li><a class="dropdown-item" href="{{ url('/permissions') }}">Permissions</a></li>
                    </ul>
                </li>

                @guest
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
