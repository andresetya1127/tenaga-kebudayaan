<footer class="text-center text-light text-lg-start" style="background: rgb(107, 184, 235);">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                @if ($info->no_kontak)
                    <h5 class="text-uppercase">Kontak </h5>
                    <!-- no_kontak -->
                    <p><i class="fa fa-phone"></i> {{ $info->no_kontak }}</p>
                @endif


                @if ($info->status_sosmed == 1)
                    <h5 class="text-uppercase">Sosial Media </h5>
                    <div class="">

                        @if ($info->facebook)
                            <!-- Facebook -->
                            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                                style="background-color: #3b5998;" href="{{ $info->facebook }}" role="button"><i
                                    class="fab fa-facebook"></i></a>
                        @endif

                        @if ($info->twiter)
                            <!-- Twitter -->
                            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                                style="background-color: #1f95f0;" href="{{ $info->twiter }}" role="button"><i
                                    class="fab fa-twitter"></i></a>
                        @endif

                        @if ($info->email)
                            <!-- Google -->
                            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                                style="background-color: #dd4b39;" href="{{ $info->email }}" role="button"><i
                                    class="fab fa-google"></i></a>
                        @endif

                        @if ($info->instagram)
                            <!-- Instagram -->
                            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                                style="background-color: #ac2bac;" href="{{ $info->instagram }}" role="button"><i
                                    class="fab fa-instagram"></i></a>
                        @endif

                        @if ($info->tiktok)
                            <!-- tiktok -->
                            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                                style="background-color: #1f1e1f;" href="{{ $info->tiktok }}" role="button"><i
                                    class="fab fa-tiktok"></i></a>
                        @endif

                        @if ($info->youtube)
                            <!-- youtube -->
                            <a data-mdb-ripple-init class="btn text-white btn-floating m-1"
                                style="background-color: #ee2f2f;" href="{{ $info->youtube }}" role="button"><i
                                    class="fab fa-youtube"></i></a>
                        @endif
                    </div>
                @endif

                @if ($info->alamat)
                    <h5 class="text-uppercase my-3">Alamat</h5>
                    <p>{{ $info->alamat }}</p>
                @endif

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <div class="d-flex align-items-center gap-5 justify-content-center">
                    <div class="text-center d-flex flex-column align-items-center ">
                        <div class="counter-row mb-2">
                            <p class="counter" data-speed="1000">
                                {{ $visitToday }}
                            </p>
                        </div>
                        <p>Pengungjung Hari Ini</p>
                    </div>
                    <div class="text-center d-flex flex-column align-items-center">
                        <div class="counter-row mb-2">
                            <p class="counter" data-speed="1000">{{ $totalVisit }}</p>
                        </div>
                        <p>Total Pengunjung</p>
                    </div>
                </div>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(14, 142, 216, 0.884);">
        <a class=" text-light" href="https://mdbootstrap.com/"> © 2024 Copyright: Dinas Pendidikan Dan Kebudayaan</a>
    </div>
    <!-- Copyright -->
</footer>
