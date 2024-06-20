<div class="">

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white" data-mdb-theme="dark">
                    <h1 class="mb-3">Dasar Hukum & Panduan</h1>
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
                <div class="col-12 my-4">
                    <h4 class="text-center">Dasar Hukum</h4>
                </div>
            </div>

            <div class="col-12 mb-4">
                <ul class="list-unstyled row row-cols-lg-3 row-cols-2">
                    @foreach ($data as $hukum)
                        <div class="col">
                            <li class="mb-3">
                                <i class="fas fa-question-circle me-2 text-warning"></i>
                                <a target="__blank" href="{{ $hukum->link_file }}">
                                    {{ $hukum->nama_dasar_hukum }}
                                </a>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
            <hr class="my-5 text-primary">
            <div class="col-12 text-center">
                <h4>Panduan Aplikasi</h4>
                <button class="btn btn-outline-info">Lihat Panduan</button>
            </div>
        </div>
    </section>
    <!--Section: Content-->
</div>
