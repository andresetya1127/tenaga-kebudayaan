<div class="col-12">
    <x-page-title :page="$page" />
    <div class="col-12 d-flex justify-content-between align-items-center mt-3 mb-2 gap-2">
        <div class="">
            <a type="button" href="{{ route('add.karya-seni') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Karya Seni
            </a>
            <button wire:click="$toggle('filter')" class="btn btn-info">Laporan</button>
        </div>

        <x-search-table place="Pencarian..." />
    </div>

    @if ($filter)
        @livewire('laporan.index', ['filter' => 'karya_seni'])
    @endif

    <x-card>
        <div class="table-responsive">
            <table class="table table-striped" width="100%">
                <thead class="">
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Cabang Seni</th>
                    <th>Pencipta</th>
                    <th>Tempat Tercipta</th>
                    <th>Jumlah Pendukung</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="align-middle">
                    @forelse ($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('detail.karya-seni', $dt->id_karya_seni) }}">{{ $dt->judul }}</a>
                            </td>
                            <td style="width:calc(100%/6)">{{ $dt->cabang_seni }}</td>
                            <td>{{ $dt->nama_pencipta }}</td>
                            <td>{{ $dt->asal_daerah }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    <i class="fa-solid fa-users"></i> {{ $dt->jumlah_pendukung }}
                                </span>
                            </td>
                            <td>
                                @if ($dt->status == 0)
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($dt->status == 1)
                                    <span class="badge bg-success">Diterima</span>
                                @else
                                    <span class="badge bg-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="{{ $dt->pesan_tolak }}">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                @if ($dt->status == 2)
                                    <button type="button" class="me-1 btn btn-outline-secondary btn-sm"
                                        wire:click="reSend('{{ $dt->id_karya_seni }}')">
                                        <i class="fa fa-spinner"></i>
                                    </button>
                                @endif


                                <button type="button" class="btn btn-outline-success btn-sm"
                                    wire:click='pembugaran("karya_seni","{{ $dt->id_karya_seni }}")'>
                                    <i class="fa-solid fa-tree"></i>
                                </button>
                                <x-link-button link="{{ route('edit.karya-seni', $dt->id_karya_seni) }}"
                                    cls="btn-outline-info btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </x-link-button>

                                <x-link-button onclick="return confirmAction('{{ $dt->id_karya_seni }}')"
                                    cls="btn-outline-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </x-link-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="20" class="text-center">Tidak Ada Data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <x-pagination :items="$data" />
        </div>
    </x-card>
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
                    @this.confirmDelete(param)
                }
            })
        }
    </script>
@endpush
