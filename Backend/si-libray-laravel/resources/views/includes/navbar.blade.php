<nav
  class="navbar navbar-expand-lg navbar-light navbar-library fixed-top navbar-fixed-top"
>
  <div class="container">
    <a href="{{ route('home') }}" class="navbar-brand mr-3">
      <img
        src="https://kadowisudaku.com/wp-content/uploads/2020/04/UIN-Maulana-Malik-Ibrahim-Malang.png"
        alt="Logo UIN"
        width="45px"
      />
    </a>
    <h5><b>Smart Library</b></h5>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}"> Home </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('cari-buku') }}" class="nav-link {{ (request()->is('cari-buku')) ? 'active' : '' }}""> Cari Buku </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('cek-tagihan') }}" class="nav-link {{ (request()->is('cek-tagihan')) ? 'active' : '' }}""> Cek Tagihan </a>
        </li>
        @guest
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link"> Register </a>
          </li>
          <li class="nav-item">
            <a
              href="{{ route('login') }}"
              class="btn btn-primary nav-link px-4 text-white"
            >
              Login
            </a>
          </li>
        @endguest

        @auth
          <li class="ml-4"><p class="mt-2">Hi, {{ Auth::user()->name }}</p></li>
          <li class="nav-item">
            <a
              href="{{ route('logout') }}"
              class="btn btn-danger nav-link px-4 text-white"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
            </form>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>