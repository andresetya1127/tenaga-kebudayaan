<!-- Navbar -->
<nav class="navbar gr-1 navbar-expand-xl navbar-dark d-lg-block sticky-top" style="z-index: 2000;">
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" href="#">
            <img src="{{ asset('storage/photos/logo-web/' . $info->logo) }}" alt="" loading="lazy" height="32">
        </a>
        <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarExample01">
            <ul class="navbar-nav d-lg-flex  d-sm-block d-md-block">
                <!-- Icons -->
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/">Beranda</a>
                </li>
                {{-- <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('urun-daya') }}">Urun Daya</a>
                </li> --}}
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('landing.karya-seni') }}">Karya Seni</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('landing.karya-budaya') }}">Karya Budaya</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('landing.odcb') }}">ODCB</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('landing.cagar-budaya') }}">Cagar Budaya</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('landing.wbtb') }}">WBTB</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page"
                        href="{{ route('landing.lembaga-komunitas') }}">Lembaga/Komunitas</a>
                </li>
                {{-- <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('dasar-hukum') }}">Dasar Hukum & Panduan</a>
                </li> --}}
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('all-galeri') }}">Galeri</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('all-galeri') }}">Panduan</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                @if (Auth::check())
                    <a class=" me-2" aria-current="page" href="{{ route('landing.dashboard') }}">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                @else
                    <a class="btn btn-rounded btn-success me-2" aria-current="page"
                        href="{{ route('login') }}">Masuk</a>
                    <a class="btn btn-rounded btn-warning" aria-current="page"
                        href="{{ route('register') }}">Daftar</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<!-- Navbar -->
