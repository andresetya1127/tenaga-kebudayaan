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
                    <label class="form-label" for="">Cari WBTb</label>
                </div>
            </div>

            <!--Datatabel-->
            <div class="col-12 ">
                <div class="table-responsive my-5">
                    <table class="table table-hover" width="100%">
                        <thead class="">
                            <th>No.</th>
                            <th>Nama WBTB</th>
                            <th>Kategori WBTB</th>
                            <th>Tingkatan Data</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal Penetapan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody class="table-group-divider table-divider-color">
                            @forelse ($data as $dt)
                                <tr wire:click="detailWbtb('{{ $dt->id_wbtb }}')" class="align-middle">
                                    <td>{{ $loop->index + $data->firstItem() }}</td>
                                    <td> {{ $dt->nama_warisan }}</td>
                                    <td style="width:calc(100%/6)">{{ $dt->kategori_wbtb }}</td>
                                    <td>{{ $dt->tingkatan_data }}</td>
                                    <td>{{ $dt->nama_petugas }}</td>
                                    <td>{{ $dt->tgl_penetapan }}</td>
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
                <!--End Datatabel-->
            </div>
        </div>
    </div>
</div>
