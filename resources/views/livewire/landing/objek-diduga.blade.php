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
                <h4 class="text-center">Daftar Objek Diduga Cagar Budaya(ODCB) Di Kabupaten Lombok Tengah</h4>
            </div>
            <div class="input-group" wire:ignore>
                <div class="form-outline" data-mdb-input-init>
                    <input type="text" class="form-control search-input" wire:model.live='search' />
                    <label class="form-label" for="">Cari ODCB</label>
                </div>
            </div>

            <div class="row row-cols-lg-4 row-cols-2 g-4">
                <div class="col">
                    <label class="form-label m-0" for="form1">Kecamatan </label>
                    <select class="form-control" wire:model.live='kecamatanID'>
                        <option selected value="">-- Kecamatan --</option>
                        @forelse ($this->kecamatan as $kec)
                            <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col">
                    <label class="form-label m-0" for="form1">Desa</label>
                    <select class="form-control" wire:model.live='desaID'>
                        <option selected value="">-- Desa --</option>
                        @forelse ($this->desa as $ds)
                            <option value="{{ $ds->id }}">{{ $ds->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col">
                    <label class="form-label m-0" for="form1">Jenis Cagar</label>
                    <select class="form-control" wire:model.live='jenisCagar'>
                        <option selected value="">-- Jenis --</option>
                        <option value="Benda">Benda</option>
                        <option value="Tak Benda">Tak Benda</option>

                    </select>
                </div>
                <div class="col">
                    <label class="form-label m-0" for="form1">Peringkat</label>
                    <select class="form-control" wire:model.live='peringkat'>
                        <option selected value="">-- Peringkat --</option>
                        <option value="1">Tidak Ada Peringkat</option>
                        <option value="2">Kabupaten</option>
                        <option value="3">Provinsi</option>
                        <option value="4">Nasional</option>

                    </select>
                </div>
            </div>

            <!--Datatabel-->
            <div class="col-12 ">
                <div class="table-responsive my-5">
                    <table class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Cagar</th>
                                <th>Pemilik</th>
                                <th>Jenis Cagar</th>
                                <th>Sifat Bangunan</th>
                                <th>Tahun Penetapan</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider table-divider-color">
                            @forelse ($data as $dt)
                                <tr wire:click="detailObjek('{{ $dt->id_odcb }}')">
                                    <td>{{ $loop->index + $data->firstItem() }}</td>
                                    <td>{{ $dt->nama_cagar }}</td>
                                    <td>{{ $dt->nama_pemilik }}</td>
                                    <td>{{ $dt->jenis_cb }}</td>
                                    <td>{{ $dt->sifat_bangunan }}</td>
                                    <td>{{ $dt->tahun_penetapan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="20">Tidak Ada Data.</td>
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
