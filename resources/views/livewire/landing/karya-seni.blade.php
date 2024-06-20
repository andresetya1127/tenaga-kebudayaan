<div class="">
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white" data-mdb-theme="dark">
                    <h1 class="mb-3">{{ $title ?? '' }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 my-4">
                <h4 class="text-center">Daftar Karya Seni Di Kabupaten Lombok Tengah</h4>
            </div>
            <div class="input-group" wire:ignore>
                <div class="form-outline" data-mdb-input-init>
                    <input type="text" class="form-control search-input" wire:model.live='search' />
                    <label class="form-label" for="">Cari Karya Seni</label>
                </div>
            </div>

            <!--Datatabel-->
            <div class="col-12 ">
                <div class="table-responsive my-5">
                    <table class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Karya</th>
                                <th>Pencipta</th>
                                <th>Cabang Seni</th>
                                <th>Asal Daerah</th>
                                <th>Jumlah Pendukung</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider table-divider-color">
                            @forelse ($data as $dt)
                                <tr wire:click="detailKaryaSeni('{{ $dt->id_karya_seni }}')" class="align-middle">
                                    <td>{{ $loop->index + $data->firstItem() }}</td>
                                    <td>{{ $dt->judul }}</td>
                                    <td>{{ $dt->nama_pencipta }}</td>
                                    <td>{{ $dt->cabang_seni }}</td>
                                    <td>{{ $dt->asal_daerah }}</td>
                                    <td>
                                        <span class="badge badge-primary " style="font-size: 0.8rem;">
                                            <i class="fa fa-users"></i> {{ $dt->jumlah_pendukung }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="20">Tidak Ada Data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <x-pagination :items="$data" class="justify-content-between" />
                </div>
                <!--End Datatabel-->
            </div>
        </div>
    </div>
</div>
