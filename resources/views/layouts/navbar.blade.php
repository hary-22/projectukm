<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/dashboard') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        @auth
          <li class="nav-item"><a class="nav-link" href="{{ route('barang.index') }}">Barang</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a></li>
          @if(auth()->user()->role === 'admin')
            <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">User</a></li>
          @endif
        @endauth
      </ul>

      <ul class="navbar-nav">
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">{{ auth()->user()->name }}</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-link nav-link" style="color:white; text-decoration:none;">Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Daftar</a></li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
