<div class="col-12">
    <x-page-title :page="$page" />

    <div class="col-12 d-flex justify-content-between align-items-center mt-3 mb-2 gap-2">
        <div class="">
            <a type="button" href="{{ route('add.cagar_budaya') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Cagar
            </a>

            <button wire:click="$toggle('filter')" class="btn btn-info">Laporan</button>

            <a href="{{ route('draft.cagar_budaya') }}" class="btn btn-secondary position-relative">
                Draf
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $draft }}
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
        </div>

        <x-search-table place="Cari Cagar Budaya..." />

    </div>


    @if ($filter)
        @livewire('laporan.index', ['filter' => 'cagar_budaya'])
    @endif


    <x-card>
        <div class="table-responsive">
            <table class="table table-striped w-100 ">
                <thead class="text-start">
                    <th>No.</th>
                    <th>Nama Cagar</th>
                    <th>Sifat Bangunan</th>
                    <th>Priode Bangunan</th>
                    <th>Gaya Arsitektur</th>
                    <th>Fungsi Bangunan</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="align-middle">
                    @forelse ($data as $dt)
                        <tr>
                            <td>{{ $loop->index + $data->firstItem() }}</td>
                            <td>
                                <a href="{{ route('detail.cagar-budaya', $dt->id_cagar) }}">{{ $dt->nama_cagar }}</a>
                            </td>
                            <td>{{ $dt->sifat_bangunan }}</td>
                            <td>{{ $dt->priode_bangunan }}</td>
                            <td>{{ $dt->gaya_arsitektur }}</td>
                            <td>{{ $dt->fungsi_bangunan }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm"
                                    wire:click='pembugaran("cagar_budaya","{{ $dt->id_cagar }}")'>
                                    <i class="fa-solid fa-tree"></i>
                                </button>
                                <x-link :href="route('edit.cagar_budaya', $dt->id_cagar)" class="btn-outline-primary">
                                    <i class="fa fa-pencil fa-sm"></i>
                                </x-link>
                                <button type="button" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirmAction('{{ $dt->id_cagar }}')">
                                    <i class="fa fa-trash fa-sm"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="20">
                                Tidak Ada Data.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <x-pagination :items="$data"></x-pagination>
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
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.confirmDelete(param)
                }
            })
        }
    </script>
@endpush
