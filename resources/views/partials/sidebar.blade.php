@php
    function navActive($routes) {
        foreach ((array) $routes as $route) {
            if (request()->routeIs($route)) return 'active';
        }
        return '';
    }
@endphp

<!-- Desktop Sidebar -->
<nav class="col-md-2 d-none d-md-block sidebar">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ navActive(['dashboard','home']) }}" href="{{ route('dashboard') }}">
                    <i class="ri-dashboard-line me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ navActive('lapangan') }}" href="{{ route('lapangan') }}">
                    <i class="ri-file-list-2-line me-2"></i> Lapangan Olahraga
                </a>
            </li>
        </ul>


        <ul class="nav flex-column position-absolute bottom-0 left-1 w-75 pb-3">
            <li class="nav-item mt-2">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link w-100 text-start d-flex align-items-center">
                        <i class="ri-logout-box-line me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
    
</nav>

<!-- Mobile Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Anang Syah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ navActive(['dashboard','home']) }}" href="{{ route('dashboard') }}">
                    <i class="ri-dashboard-line me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ navActive('lapangan') }}" href="{{ route('lapangan') }}">
                    <i class="ri-file-list-2-line me-2"></i> Lapangan Olahraga
                </a>
            </li>
        </ul>

        <ul class="nav flex-column position-absolute bottom-0 left-1 w-75 pb-3">
            <li class="nav-item mt-2">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link w-100 text-start d-flex align-items-center">
                        <i class="ri-logout-box-line me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
