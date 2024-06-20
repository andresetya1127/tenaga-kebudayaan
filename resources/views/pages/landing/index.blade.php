@extends('pages.landing._template')
@section('content')
    @include('pages.landing._navbar')

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white" data-mdb-theme="dark">
                    <h1 class="mb-3">Amanat Undang-Undang Nomor 5 Tahun 2017 tentang Pemajuan Kebudayaan</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->

    <!--Main Navigation-->
    <!--Main layout-->

    <!--Section: Content-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="text-center my-4"><strong>Apa itu <span class="text-warning"> DAPOBUD</span>?</strong></h2>
                    <p class="text-muted lh-lg">
                        Aplikasi Data Pokok Kebudayaan, yang selanjutnya disingkat Aplikasi DAPOBUD adalah bagian dari
                        Sistem Pendataan Kebudayaan Terpadu yang dikelola oleh Kementerian Pendidikan, Kebudayaan,
                        Riset, dan Teknologi yang digunakan untuk mengintegrasikan dan menyajikan berbagai data
                        kebudayaan yang diperbaharui secara daring untuk mewujudkan Data Referensi Kebudayaan yang
                        terintegrasi dari tingkat Kabupaten/Kota, Provinsi, sampai tingkat Pusat.
                    </p>
                </div>

            </div>
    </section>
    <!--Section: Content-->

    <hr>

    <!--Section: Content-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2><strong>Berita <span class="text-warning">Terbaru.</span></strong></h2>
                </div>

                <div class="d-flex align-items-center gap-5 my-5 about">
                    @foreach ($news as $nws)
                        <div class="card bg-dark text-white text-center">
                            <img src="{{ asset('storage/photos/' . $nws->image) }}" class="card-img" alt="Stony Beach" />
                            <div class="mask rounded-4" style="background-color: hsla(0, 0%, 0%, 0.6)"></div>
                            <div class="card-img-overlay">
                                <h5 class="card-title text-ellips ">{{ $nws->title }}</h5>
                                <div class="my-2">
                                    <p class="text-warning m-0">
                                        <i class="fa fa-user"></i> {{ $nws->name }}
                                    </p>
                                    <p class="text-warning">
                                        <i class="fa fa-calendar"></i> {{ $nws->tgl_upload }}
                                    </p>
                                </div>
                                <p class="card-text text-ellips">
                                    {{ $nws->content }}
                                </p>

                                <div class=" mt-4">
                                    <a href="{{ route('show.berita', $nws->id_berita) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-book"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="{{ route('all.berita') }}" class="btn btn-primary">
                        <i class="fa-solid fa-layer-group"></i> Semua Berita.
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--Section: Content-->

    <hr>

    <!--Section: Content-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h2 class="text-center"><strong>Total <span class="text-warning">DAPOBUD.</span></strong></h2>
                </div>

                <div class="col-xxl-5 col-lg-6 col-sm-12 m-auto mb-5">
                    <div class="card text-center border text-warning shadow">
                        <h1 class="counter card-body" data-speed="900">900</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section: Content-->
    <hr>
    <!--Section: Content-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4 text-center">
                    <h2>
                        <strong>Pertanyaan Seputar <span class="text-warning">DAPOBUD.</span></strong>
                    </h2>
                    <p class="text-muted">Daftar pertanyaan umum dan jawaban seputar DAPOBUD</p>
                </div>

                <div class="col-12 my-4">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="h-100 card border border-warning">
                                    <div class="card-body shadow">
                                        <h6>Apakah untuk melakukan pendataan harus memiliki akun terlebih dahulu?</h6>
                                        <p class="fs-6 text-muted">
                                            Untuk melakukan pendataan DAPOBUD, pengguna harus memiliki akun terlebih dahulu.
                                        </p>
                                        <ul class="list-unstyled">
                                            <li class="mb-1 fs-6"><i class="fas fa-check-circle me-2 text-success"></i>
                                                Bagi pemerintah daerah baik kabupaten/kota, provinsi dan pemerintah pusat di
                                                bidang kebudayaan kebudayaan dapat melakukan pendaftaran melalui halaman
                                                daftar atau dapat menghubungi email resmi DAPOBUD: dapobud@kemdikbud.go.id.
                                            </li>
                                            <li class="mb-1 fs-6"><i class="fas fa-check-circle me-2 text-success"></i>
                                                Bagi masyarakat umum baik individu maupun kelompok dapat mendaftar akun
                                                melalui halaman Urun daya kemudian dapat menghubungi email resmi DAPOBUD:
                                                dapobud@kemdikbud.go.id.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="h-100 card border border-warning">
                                    <div class="card-body shadow">
                                        <h6>Adakah Pedoman Aplikasi Dapobud?</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-1 fs-6"><i class="fas fa-check-circle me-2 text-success"></i>
                                                Ada, dokumen yang berkaitan dengan DAPOBUD dapat diunduh melalui halaman
                                                Dasar <a href="#">Hukum & Panduan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="h-100 card border border-warning">
                                    <div class="card-body shadow">
                                        <h6>Bagaimana cara menghubungi admin website apabila memiliki kendala dalam
                                            mengakses website ini?</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-1 fs-6"><i class="fas fa-check-circle me-2 text-success"></i>
                                                Pengguna dapat menghubungi email: dapobud@kemdikbud.go.id atau mengakses
                                                laman khusus melalui tautan <a href="#">linktr.ee/dapobud</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                        <div class="autoplay-progress">
                            <svg viewBox="0 0 48 48">
                                <circle cx="24" cy="24" r="20"></circle>
                            </svg>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section: Content-->

    <!--Main layout-->
    @include('pages.landing._footer')
@endsection
