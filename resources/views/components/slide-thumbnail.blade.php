@props(['data' => false])

<div class="swiper img-slider-thumbnail">
    <div class="swiper-wrapper">
        @if (strstr($data, '||') !== false)
            @foreach (explode('||', $data) as $img)
                <div class="swiper-slide">
                    <div class="h-100">
                        <div class="card-body shadow">
                            @if (Storage::exists('public/photos/' . $img))
                                <img class="rounded-4 img-thumbnail" style="object-fit: cover; height: 400px; width: 100%"
                                    src="{{ asset('storage/photos/' . $img) }}" />
                            @else
                                <img class="rounded-4 img-thumbnail" style="object-fit: cover; height: 400px; width: 100%"
                                    src="{{ asset('storage/photos/logo-web/img-not-found.png') }}" />
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @if (!Storage::exists('public/photos/' . $data) || empty($data))
                <img class="rounded-4 img-thumbnail" style="object-fit: cover; height: 400px; width: 100%"
                    src="{{ asset('storage/photos/logo-web/img-not-found.png') }}" />
            @else
                <img class="rounded-4 img-thumbnail" style="object-fit: cover; height: 400px; width: 100%"
                    src="{{ asset('storage/photos/' . $data) }}" />
            @endif
        @endif
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
