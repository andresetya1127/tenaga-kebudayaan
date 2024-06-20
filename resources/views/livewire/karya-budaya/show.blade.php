<div class="col-12">
    <x-page-title :page="$page" />
    <div class="d-flex justify-content-between align-items-center mt-3 mb-2 gap-2">
        <div>
            <a type="button" href="{{ route('add.karya-budaya') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Karya Budaya
            </a>

            <button wire:click="$toggle('filter')" class="btn btn-info">Laporan</button>
        </div>

        <x-search-table />
    </div>


    @if ($filter)
        @livewire('laporan.index', ['filter' => 'karya_budaya'])
    @endif

    <x-card>
        <div class="table-responsive">
            <table class="table table-striped" width="100%">
                <thead class="">
                    <th>No.</th>
                    <th>Nama Karya</th>
                    <th>Jenis Karya</th>
                    <th>Tempat Tercipta</th>
                    <th>Pencipta</th>
                    <th>Jumlah Pendukung</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="align-middle">
                    @forelse ($data as $dt)
                        <tr>
                            <td>{{ $loop->index + $data->firstItem() }}</td>
                            <td>
                                <a href="{{ route('detail.karya-budaya', $dt->id_karya_budaya) }}">
                                    {{ $dt->nama_karya }}</a>
                            </td>
                            <td style="width:calc(100%/6)">{{ $dt->jenis_karya }}</td>
                            <td>{{ $dt->asal_daerah }}</td>
                            <td>{{ $dt->nama_pencipta }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    <i class="fa fa-users"></i> {{ $dt->jumlah_pendukung }}
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
                                        wire:click="reSend('{{ $dt->id_karya_budaya }}')">
                                        <i class="fa fa-spinner"></i>
                                    </button>
                                @endif

                                <button type="button" class="btn btn-outline-success btn-sm"
                                    wire:click='pembugaran("karya_budaya","{{ $dt->id_karya_budaya }}")'>
                                    <i class="fa-solid fa-tree"></i>
                                </button>

                                <x-link-button link="{{ route('edit.karya-budaya', $dt->id_karya_budaya) }}"
                                    cls="btn-outline-info btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </x-link-button>

                                <x-link-button onclick="return confirmAction('{{ $dt->id_karya_budaya }}')"
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
