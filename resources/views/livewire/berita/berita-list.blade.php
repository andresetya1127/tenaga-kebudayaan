<div class="">
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
            <button class="btn {{ $block ? 'btn-outline-primary' : 'btn-primary' }}" wire:click="$set('block',false)">
                <i class="fa-solid fa-list-ul"></i>
            </button>
            <button class="btn {{ $block ? 'btn-primary' : 'btn-outline-primary' }}" wire:click="$set('block',true)">
                <i class="fa-solid fa-cubes"></i>
            </button>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('add.berita') }}" class="btn btn-outline-success" data-bs-toggle="tooltip"
                data-bs-placement="bottom" data-bs-original-title="Klik Untuk Tambah Berita">
                <i class="fa-solid fa-plus"></i>
            </a>
            <x-search-table place="Cari Cagar Budaya..." />
        </div>
    </div>


    <div class="mt-4">
        @if ($block)
            @forelse ($data as $berita)
                <x-card>
                    <div class="row">
                        <div class="col-3">
                            <img class="rounded-4 img-thumbnail" style="object-fit: cover; height: 150px; width: 80%"
                                src="{{ asset('storage/photos/' . $berita->image) }}" />
                        </div>
                        <div class="col-9">
                            <div class="overflow-hidden " style="max-height: 100px;">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <h5 class="m-0 p-0">{{ $berita->title }}</h5>
                                    <span class="badge bg-secondary">
                                        <i class="fa fa-eye"></i> {{ $berita->views }}
                                    </span>
                                    <span class="badge bg-secondary">
                                        <i class="fa fa-user"></i> {{ $berita->name }}
                                    </span>
                                    <span class="badge bg-secondary">
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
                <div class="text-center">Belum Ada Berita.</div>
            @endforelse
        @else
            <x-card class="mt-5">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>judul</th>
                                <th>Penulis</th>
                                <th>Tanggal Upload</th>
                                <th>Dibaca</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $news)
                                <tr>
                                    <td>{{ $loop->index + $data->firstItem() }}</td>
                                    <td>{{ $news->title }}</td>
                                    <td>{{ $news->name }}</td>
                                    <td>{{ $news->tgl_upload }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            <i class="fa fa-eye"></i> {{ $news->views }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.berita', $news->id_berita) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <x-link-button onclick="return confirmAction('{{ $news->id_berita }}')"
                                            cls="btn-outline-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </x-link-button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="20" class="text-center">Belum Ada Data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-card>
        @endif
        <x-pagination :items="$data"></x-pagination>
    </div>
</div>

@push('script')
    <script>
        function confirmAction(param) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus itu!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Panggil metode untuk melakukan tindakan yang sesuai jika pengguna mengonfirmasi
                    @this.deleteNews(param)
                }
            })
        }
    </script>
@endpush
