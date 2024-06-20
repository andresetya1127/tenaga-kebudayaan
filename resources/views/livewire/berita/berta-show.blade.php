<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('all.berita') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="col-12 my-5">
            <x-card>
                <div class="text-center">
                    <!-- Header -->
                    <h4>{{ $news->title }}</h4>
                    <img src="{{ asset('storage/photos/' . $news->image) }}" alt="" class="img-thumbnail"
                        style="max-height: 390px; width: 600px; object-fit: cover;">
                    <div class="mt-3">
                        <span class="badge bg-primary">
                            <i class="fa fa-user"></i> {{ $news->name }}
                        </span>
                        <span class="badge bg-primary">
                            <i class="fa fa-eye"></i> {{ $news->views }}
                        </span>
                        <span class="badge bg-primary">
                            <i class="fa fa-calendar"></i> {{ $news->tgl_upload }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="mt-5">
                    {!! $news->content !!}
                </div>
            </x-card>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).ready(function() {
            var startTime = new Date().getTime();
            var starTime = setInterval(function() {
                var currentTime = new Date().getTime();
                var runTime = Math.floor((currentTime - startTime) / 1000);

                if (runTime >= 15) {
                    @this.reading();
                    clearTime();
                }

            }, 1000);

            function clearTime() {
                clearInterval(starTime);
            }
        });
    </script>
@endpush
