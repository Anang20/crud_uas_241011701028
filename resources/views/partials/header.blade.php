<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-3 shadow-sm">
  <!-- Sidebar Toggle Button -->
  <button class="btn btn-light d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
    <i class="ri-menu-line"></i>
  </button>

  <a class="navbar-brand" href="#">Anang Syah</a>

  <ul class="navbar-nav ms-auto px-3">
    @auth
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">Logout</button>
            </form>
          </li>
        </ul>
      </li>
    @else
      <li class="nav-item">
        <a href="{{ route('login') }}" class="nav-link">Login</a>
      </li>
    @endauth
  </ul>
</nav>