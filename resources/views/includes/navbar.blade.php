<div class="navbar {{ \App\Helpers\NavbarTheme::getNavbarTheme() }} shadow-sm p-2">
    <div class="container">
        <a href="{{ route('home.index') }}" class="navbar-brand fw-bold">Laravel</a>
        @if (Auth::Check())
            <ul class="navbar-nav me-auto ms-4">
                <li class="navbar-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ \App\Helpers\NavbarTheme::getActiveNavbar() }}">Dashboard</a>
                </li>
            </ul>
        @endif
        @guest
        <ul class="navbar-nav flex-row">
            <li class="navbar-item me-3">
                <a href="{{ route('login') }}" class="btn btn-light">Login</a>
            </li>
            <li class="navbar-item">
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </li>
        </ul>
        @else
        <div class="navbar-item dropdown">
            <a class="nav-link dropdown-toggle navbar-text" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
        @endguest
        
    </div>
</div>