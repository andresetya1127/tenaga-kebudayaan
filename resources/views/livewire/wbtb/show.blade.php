<div class="col-12">
    <x-page-title :page="$page" />
    <div class="d-flex justify-content-between align-items-center mt-3 mb-2 gap-2">
        <div class="">
            <a type="button" href="{{ route('add.wbtb') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> WBTb
            </a>
            <button wire:click="$toggle('filter')" class="btn btn-info">Laporan</button>
        </div>

        <x-search-table />
    </div>

    @if ($filter)
        @livewire('laporan.index', ['filter' => 'wbtb'])
    @endif

    <x-card>
        <div class="table-responsive">
            <table class="table table-striped" width="100%">
                <thead class="">
                    <th>No.</th>
                    <th>Nama WBTB</th>
                    <th>Kategori WBTB</th>
                    <th>Tingkatan Data</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal Penetapan</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="align-middle">
                    @forelse ($data as $dt)
                        <tr>
                            <td>{{ $loop->index + $data->firstItem() }}</td>
                            <td>
                                <a href="{{ route('detail.wbtb', $dt->id_wbtb) }}">{{ $dt->nama_warisan }}</a>
                            </td>
                            <td style="width:calc(100%/6)">{{ $dt->kategori_wbtb }}</td>
                            <td>{{ $dt->tingkatan_data }}</td>
                            <td>{{ $dt->nama_petugas }}</td>
                            <td>{{ $dt->tgl_penetapan }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm"
                                    wire:click='pembugaran("wbtb","{{ $dt->id_wbtb }}")'>
                                    <i class="fa-solid fa-tree"></i>
                                </button>
                                <x-link-button link="{{ route('edit.wbtb', $dt->id_wbtb) }}"
                                    cls="btn-outline-info btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </x-link-button>

                                <x-link-button onclick="return confirmAction('{{ $dt->id_wbtb }}')"
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
