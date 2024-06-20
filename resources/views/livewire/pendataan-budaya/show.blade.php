<div class="col-12">
    <x-page-title :page="$page" />
    <div class="col-12 d-flex justify-content-between align-items-center mt-3 mb-2 gap-2">
        <div class="">
            <a type="button" href="{{ route('add.pendataan-kebudayaan') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Tenaga Kebudayaan
            </a>
            <button wire:click="$toggle('filter')" class="btn btn-info">Laporan</button>
        </div>

        <x-search-table place="Cari Cagar Budaya..." />
    </div>

    @if ($filter)
        @livewire('laporan.index', ['filter' => 'tenaga_kebudayaan'])
    @endif

    <x-card>
        <div class="table-responsive">
            <table class="table table-striped" width="100%">
                <thead class="">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No.Hp</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="align-middle">
                    @forelse ($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->nama }}</td>
                            <td>{{ $dt->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Prempuan' }}</td>
                            <td>{{ $dt->no_hp }}</td>
                            <td>{{ $dt->pekerjaan }}</td>
                            <td>
                                <x-link-button
                                    link="{{ route('edit.pendataan-kebudayaan', $dt->id_tenaga_kebudayaan) }}"
                                    cls="btn-info">
                                    <i class="fa fa-pencil"></i>
                                </x-link-button>

                                <x-link-button link="">
                                    <i class="fa fa-eye"></i>
                                </x-link-button>

                                <x-link-button onclick="return confirmAction('{{ $dt->id_tenaga_kebudayaan }}')"
                                    cls="btn-danger">
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
