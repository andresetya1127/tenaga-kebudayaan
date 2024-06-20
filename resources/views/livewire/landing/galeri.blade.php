<div class="">
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white" data-mdb-theme="dark">
                    <h1 class="mb-3">{{ $title ?? '' }} {{ $info->nama_web }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row row-cols-1 row-cols-lg-3 g-4 animate__animated animate__backInRight">
            <div class="data-swiper d-none" data-length="{{ $galeri->count() }}"></div>
            @forelse ($galeri as $img)
                @php
                    $exp = explode('||', $img->foto);
                @endphp
                <div class="col">
                    <div class="card">
                        <div class="card-body p-3">
                            <h6 class="text-center">{{ $img->nama_foto }} Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Illum, debitis!</h6>
                            <!-- Swiper -->
                            <div class="swiper swipe-slider{{ $loop->iteration }}" style="height: 400px">
                                <div class="swiper-wrapper">
                                    @foreach ($exp as $x)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/photos/' . $x) }}" alt=""
                                                style="object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col m-auto text-center">Belum ada gambar.</div>
            @endforelse
        </div>
        <x-pagination :items="$galeri" />
    </div>
</div>
