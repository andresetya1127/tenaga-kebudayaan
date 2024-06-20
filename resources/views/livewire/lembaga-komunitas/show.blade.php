<div class="col-12">
    <x-page-title :page="$page" />
    <div class="col-12 d-flex justify-content-between align-items-center mt-3 mb-2 gap-2">
        <div class="">
            <a type="button" href="{{ route('add.lembaga-komunitas') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Lembag/Komunitas
            </a>
            <button wire:click="$toggle('filter')" class="btn btn-info">Laporan</button>
        </div>

        <x-search-table place="Cari Cagar Budaya..." />
    </div>


    @if ($filter)
        @livewire('laporan.index', ['filter' => 'lembaga_komunitas'])
    @endif

    <x-card>
        <div class="table-responsive">
            <table class="table table-striped" width="100%">
                <thead class="">
                    <th>No.</th>
                    <th>Lembaga/Komunitas</th>
                    <th>Jenis</th>
                    <th>Ketua</th>
                    <th>Tanggal Pendirian</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="align-middle">
                    @forelse ($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('detail.lembaga', $dt->id_lembaga) }}">{{ $dt->nama_lembaga }}</a>
                            </td>
                            <td>{{ $dt->jenis_lembaga }}</td>
                            <td>{{ $dt->nama_ketua }}</td>
                            <td>{{ $dt->tgl_pendirian }}</td>
                            <td>
                                <x-link-button link="{{ route('edit.lembaga-komunitas', $dt->id_lembaga) }}"
                                    cls="btn-outline-info btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </x-link-button>

                                <x-link-button onclick="return confirmAction('{{ $dt->id_lembaga }}')"
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
