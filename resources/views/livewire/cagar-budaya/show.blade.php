<div class="col-12">
    <x-search-table place="Cari Cagar Budaya..." link="{{ route('add.cagar_budaya') }}">
        <i class="fa fa-plus"></i>
    </x-search-table>
    <x-card>
        <div class="table-responsive">
            <table class="table table-striped w-100 ">
                <thead class="text-start">
                    <th>No.</th>
                    <th>Nama Pemilik</th>
                    <th>Jenis Kelamin</th>
                    <th>No.Hp</th>
                    <th>Pekerjaan</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </thead>
                <tbody class="align-middle">
                    @forelse ($cagar_budaya as $cagar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cagar->nama_pemilik }}</td>
                            <td>{{ $cagar->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Prempuan' }}</td>
                            <td>{{ $cagar->no_hp }}</td>
                            <td>{{ $cagar->pekerjaan }}</td>
                            <td>
                                @if ($cagar->detailCagar)
                                    <i class="fs-4 c-green-500 fa fa-cloud"></i>
                                @else
                                    <a href="{{ route('detail_komponen.cagar_budaya', $cagar->id_cagar_budaya) }}">
                                        <i class="fs-4 text-danger fa fa-close"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <x-link-button link="{{ route('edit.cagar_budaya', $cagar->id_cagar_budaya) }}"
                                    cls="btn-outline-info">
                                    <i class="fa fa-pencil"></i>
                                </x-link-button>

                                <x-link-button link="{{ route('detail.cagar_budaya', $cagar->id_cagar_budaya) }}"
                                    cls="btn-outline-primary">
                                    <i class="fa fa-eye"></i>
                                </x-link-button>

                                <x-link-button wire:confirm='Apakah Anda Yakin ?'
                                    wire:click="delete_cagar('{{ $cagar->id_cagar_budaya }}')" cls="btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </x-link-button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-card>
</div>
