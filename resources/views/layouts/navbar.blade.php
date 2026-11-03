<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="{{ auth()->check() ? route('dashboard') : route('home') }}">
      <i class="bi bi-box-seam-fill"></i>
      <span>{{ config('app.name', 'Inventory UKM') }}</span>
    </a>

    <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
              <i class="bi bi-speedometer2 me-1"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}" href="{{ route('barang.index') }}">
              <i class="bi bi-boxes me-1"></i> Data Barang
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
              <i class="bi bi-tags me-1"></i> Kategori
            </a>
          </li>
          @if(auth()->user()->role === 'admin')
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                <i class="bi bi-people-fill me-1"></i> Manajemen User
              </a>
            </li>
          @endif
        @endauth
      </ul>

      <ul class="navbar-nav align-items-lg-center">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle fs-5"></i>
              <span>{{ auth()->user()->name }}</span>
              <span class="badge {{ auth()->user()->role === 'admin' ? 'bg-warning text-dark' : 'bg-primary text-white' }} badge-role">
                {{ auth()->user()->role }}
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
              <li>
                <a class="dropdown-item py-2" href="{{ route('profile.edit') }}">
                  <i class="bi bi-person-gear me-2 text-primary"></i> Pengaturan Profil
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item py-2 text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
              <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
            </a>
          </li>
          <li class="nav-item ms-lg-2">
            <a class="btn btn-primary btn-sm px-3 text-white" href="{{ route('register') }}">
              <i class="bi bi-person-plus me-1"></i> Daftar
            </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
