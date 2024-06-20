<div class="">
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask">
            <div class=" p-0 container-fluid d-flex align-items-center justify-content-center text-center h-100">
                @if ($info->foto_landing)
                    <img src="{{ asset('storage/photos/logo-web/' . $info->foto_landing) }}" alt="" width="100%"
                        height="100%" class="fit-fill">
                @endif
            </div>
        </div>
    </div>
    <!-- Background image -->

    <!--Main Navigation-->
    <!--Main layout-->
    @if ($info->nama_web && $info->deskripsi)
        <!--Section: Content-->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h2 class="text-center my-4"><strong>Apa itu <span class="text-warning"> {{ $info->nama_web }}
                                </span>?</strong>
                        </h2>
                        <p class="text-muted lh-lg">
                            {{ $info->deskripsi }}
                        </p>
                    </div>

                </div>
        </section>
        <!--Section: Content-->

        <hr>
    @endif

    @if ($info->sekapur_sirih)
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <img src="{{ asset('storage/photos/logo-web/' . $info->foto_kepala) }}" alt=""
                            class="img-thumbnail">
                        <p class="text-muted text-center">{{ $info->kepala_dinas }}</p>
                    </div>

                    <div class="col-lg-8 col-12 lh-lg" style="text-align: justify;">
                        {{ $info->sekapur_sirih }}
                    </div>
                </div>
        </section>
    @endif
    <hr>

    <!--Section: Content-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2><strong>Berita <span class="text-warning">Terbaru.</span></strong></h2>
                </div>
                <div class="swiper img-slider-3 mt-3">
                    <div class="swiper-wrapper">
                        @foreach ($berita as $nws)
                            <div class="swiper-slide">
                                <div class="card border border-warning text-light text-center"
                                    style="max-height: 450px">
                                    <img src="{{ asset('storage/photos/' . $nws->image) }}" style="object-fit: fill;" />
                                    <div class="mask rounded-4" style="background-color: hsla(0, 0%, 0%, 0.692)">
                                    </div>
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
                                            <a href="{{ route('show.berita', $nws->id_berita) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-book"></i> Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="text-center mt-4">
                    @if ($berita->count() == 0)
                        <p>Belum ada berita.</p>
                    @endif
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
                <div class="col-12 my-4 text-center">
                    <h2>
                        <strong>Pertanyaan Seputar <span class="text-warning"> {{ $info->nama_web }}</span></strong>
                    </h2>
                    <p class="text-muted">Daftar pertanyaan umum dan jawaban seputar {{ $info->nama_web }}</p>
                </div>

                <div class="col-12 my-4">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="overflow-hidden card border border-warning h-100"
                                    style="max-height: 450px;">
                                    <div class="card-body shadow">
                                        <h6>Apakah untuk melakukan pendataan harus memiliki akun terlebih dahulu?</h6>

                                        <ul class="list-unstyled">
                                            <li class="mb-1 fs-6"><i class="fas fa-check-circle me-2 text-success"></i>
                                                Untuk melakukan pendataan Dinas Pendidikan dan Kebudayaan, pengguna
                                                harus
                                                memiliki akun terlebih dahulu.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="overflow-hidden card border border-warning h-100"
                                    style="max-height: 450px;">
                                    <div class="card-body shadow">
                                        <h6>Adakah Pedoman Aplikasi Dinas Pendidikan dan Kebudayaan?</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-1 fs-6"><i class="fas fa-check-circle me-2 text-success"></i>
                                                Ada, dokumen yang berkaitan dengan Dinas Pendidikan dan Kebudayaan dapat
                                                diunduh melalui halaman
                                                Dasar <a href="#">Hukum & Panduan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="overflow-hidden card border border-warning h-100"
                                    style="max-height: 450px;">
                                    <div class="card-body shadow">
                                        <h6>Bagaimana cara menghubungi admin website apabila memiliki kendala dalam
                                            mengakses website ini?</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-1 fs-6"><i class="fas fa-check-circle me-2 text-success"></i>
                                                Pengguna dapat menghubungi email: Dinas Pendidikan dan
                                                Kebudayaan atau mengakses
                                                laman khusus melalui tautan <a href="#">linktr.ee/Dinas Pendidikan
                                                    dan Kebudayaan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
