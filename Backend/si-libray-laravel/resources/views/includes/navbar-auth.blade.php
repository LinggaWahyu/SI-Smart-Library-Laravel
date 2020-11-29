<nav
  class="navbar navbar-expand-lg navbar-light navbar-library fixed-top navbar-fixed-top"
>
  <div class="container">
    <a href="/index.html" class="navbar-brand mr-3">
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
          <a href="{{ route('home') }}" class="nav-link"> Home </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('cari-buku') }}" class="nav-link"> Cari Buku </a>
        </li>
        <li class="nav-item">
          <a
            href="{{ route('login') }}"
            class="btn btn-primary nav-link px-4 text-white"
          >
            Login
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>