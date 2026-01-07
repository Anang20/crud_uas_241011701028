{{-- <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-1 shadow">
  <button class="btn btn-dark d-md-none ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
    <i class="ri-menu-line"></i>
  </button>

  <a class="navbar-brand col-sm-3 col-md-2 me-0 px-3" href="#">Admin</a>

  <ul class="navbar-nav ms-auto px-3">
    @auth
      <li class="nav-item dropdown-center">
        <a href="#" class="nav-link dropdown-toggle" role="button"
           data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>

        <ul class="dropdown-menu">
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">
                Logout
              </button>
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
</nav> --}}

<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-3 shadow-sm">
  <!-- Sidebar Toggle Button -->
  <button class="btn btn-light d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" style="color: white;">
    <i class="ri-menu-line"></i>
  </button>
  <a class="navbar-brand" href="#">Anang Syah</a>
  <ul class="navbar-nav ms-auto px-3">
    @auth
      <li class="nav-item dropdown-center">
        <a href="#" class="nav-link dropdown-toggle" role="button"
           data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>

        <ul class="dropdown-menu">
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">
                Logout
              </button>
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