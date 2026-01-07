@php
    function navActive($routes) {
        foreach ((array) $routes as $route) {
            if (request()->routeIs($route)) {
                return 'active bg-secondary rounded text-white';
            }
        }
        return 'nav-inactive';
    }
@endphp

<nav class="col-md-2 d-none d-md-block sidebar">
    <div class="sidebar-sticky position-relative overflow-auto" style="height:calc(100vh - 60px);">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ navActive(['home','dashboard']) }}"
                   href="{{ route('dashboard') }}">
                    <i class="ri-dashboard-line me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ navActive('lapangan') }}"
                   href="{{ route('lapangan') }}">
                    <i class="ri-file-list-2-line me-2"></i> Lapangan Olahraga
                </a>
            </li>
        </ul>
    </div>
    </nav>

    <!-- Offcanvas Sidebar (mobile) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Navigation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ navActive(['home','dashboard']) }}"
                   href="{{ route('dashboard') }}">
                    <i class="ri-dashboard-line me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ navActive('lapangan') }}"
                   href="{{ route('lapangan') }}">
                    <i class="ri-file-list-2-line me-2"></i> Lapangan Olahraga
                </a>
            </li>
        </ul>
    </div>
    </div>