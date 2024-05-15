<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src={{ asset('home/img/icon-deal.png') }} alt="Icon"
                    style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">FBMS</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ route('welcome') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('home.all.properties') }}" class="nav-item nav-link">Property</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="property-list.html" class="dropdown-item">Property List</a>
                        <a href="property-type.html" class="dropdown-item">Property Type</a>
                        <a href="property-agent.html" class="dropdown-item">Property Agent</a>
                    </div>
                </div> --}}
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                    </div>
                </div> --}}
                {{-- <a href="#" class="nav-item nav-link">About</a>
                <a href="#" class="nav-item nav-link">Contact</a> --}}
            </div>
            @if (auth()->user())
                <div class="dropdown d-flex align-items-center">
                    <a class="dropdown-toggle text-decoration-none" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset(auth()->user()->photo) }}" alt="User Photo" class="rounded-circle me-2"
                            style="width: 32px; height: 32px;">
                        {{ auth()->user()->name }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        @if (auth()->user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @elseif (auth()->user()->role == 'owner')
                            <li><a class="dropdown-item" href="{{ route('owner.dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('owner.dashboard') }}">Dashboard</a></li>
                        @endif
                        {{-- <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li> --}}
                        <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                            @csrf <!-- CSRF protection -->
                            <button type="submit">Logout</button>
                        </form>
                        <!-- Add other dropdown items if needed -->
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>
            @endif

        </div>
    </nav>
</div>
<!-- Navbar End -->
