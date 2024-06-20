<div class="container py-3 mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center my-4">Berita Seputar <span class="text-warning">Dapobud</span></h2>
            <div class="input-group" wire:ignore>
                <div class="form-outline" data-mdb-input-init>
                    <input type="text" class="form-control search-input" wire:model.live='search' />
                    <label class="form-label" for="">Cari Berita</label>
                </div>
            </div>

            <div class="btn-group mt-4">

                <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off"
                    wire:click="$set('populer',false)" />
                <label class="btn {{ $populer ? 'btn-secondary' : 'btn-primary' }}" for="option2" data-mdb-ripple-init>
                    Terbaru <i class="fa-regular fa-newspaper"></i>
                </label>

                <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off"
                    wire:click="$set('populer',true)" />
                <label class="btn {{ $populer ? 'btn-primary' : 'btn-secondary' }}" for="option3" data-mdb-ripple-init>
                    Populer <i class="fa-solid fa-fire"></i>
                </label>

            </div>

        </div>

        <div class="mt-4">
            @forelse ($news as $berita)
                <x-card>
                    <div class="row">
                        <div class="col-3">
                            <img class="rounded-4 img-thumbnail" style="object-fit: cover; height: 150px; width: 80%"
                                src="{{ asset('storage/photos/' . $berita->image) }}" />
                        </div>
                        <div class="col-9">
                            <div class="overflow-hidden" style="max-height: 100px;">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <h5 class="m-0 p-0">{{ $berita->title }}</h5>
                                    <span class="badge bg-dark">
                                        <i class="fa fa-eye"></i> {{ $berita->views }}
                                    </span>
                                    <span class="badge bg-dark">
                                        <i class="fa fa-user"></i> {{ $berita->name }}
                                    </span>
                                    <span class="badge bg-dark">
                                        <i class="fa-regular fa-calendar-check"></i> {{ $berita->tgl_upload }}
                                    </span>
                                </div>
                                <span class="text-muted ">{!! $berita->content !!}</span>

                            </div>
                            <div class="text-end">
                                <a href="{{ route('show.berita', $berita->id_berita) }}" class="btn btn-info mt-3">
                                    Lihat <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </x-card>
            @empty
                <div class="text-center mb-5"><i class="fa-solid fa-newspaper"></i> Belum Ada Berita.</div>
            @endforelse
        </div>
        <x-pagination :items="$news" />
    </div>

</div>
