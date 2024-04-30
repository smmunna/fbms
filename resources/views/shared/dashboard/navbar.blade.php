@php
    $pendingCount = DB::table('flats')->where('status', 'pending')->count();

@endphp

@php
    use Carbon\Carbon;

    $totalNotices = DB::table('notices')->where('created_at', '>=', Carbon::now()->subDays(3))->count();
@endphp

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('welcome') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>


        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @if (auth()->user()->role == 'admin' && $pendingCount > 0)
                    <span class="badge badge-warning navbar-badge">1</span>
                @endif

                @if (auth()->user()->role == 'owner' && $totalNotices > 0)
                    <span class="badge badge-warning navbar-badge">1</span>
                @endif

                @if (auth()->user()->role == 'user' && $totalNotices > 0)
                    <span class="badge badge-warning navbar-badge">1</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @if (auth()->user()->role == 'admin')
                    @if ($pendingCount > 0)
                        <a href="{{ route('pending.flat') }}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $pendingCount }} new flats are waiting for approval
                        </a>
                        <div class="dropdown-divider"></div>
                    @endif
                @endif
                @if (auth()->user()->role == 'owner')
                    @if ($pendingCount > 0)
                        <a href="{{ route('owner.notices') }}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $totalNotices }} new notices published last 3 days
                        </a>
                        <div class="dropdown-divider"></div>
                    @endif
                @endif
                @if (auth()->user()->role == 'user')
                    @if ($pendingCount > 0)
                        <a href="{{ route('user.notices') }}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $totalNotices }} new notices published last 3 days
                        </a>
                        <div class="dropdown-divider"></div>
                    @endif
                @endif
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
