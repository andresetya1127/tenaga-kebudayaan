<div class="col-12">
    <x-page-title :page="$page" />

    <div class="my-2">
        <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $step == 1 ? 'active' : '' }}">
                    <span class="nav-text">Tahap 1</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $step == 2 ? 'active' : '' }}">
                    <span class="nav-text">Tahap 2</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $step == 3 ? 'active' : '' }}">
                    <span class="nav-text">Tahap 3</span>
                </a>
            </li>
        </ul>
    </div>

    <x-card>
        @if ($step == 1)
            <form wire:submit.prevent='nextStep'>
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                    <x-select label='Kabupaten' key='kabupaten' wire:model.change='form.kabupaten'>
                        <option value="-" selected>--Pilih Kecamatan--</option>
                        @foreach ($this->kabupatenOption as $kab)
                            <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                        @endforeach
                    </x-select>


                    <x-select label='Kecamatan' key='kecamatan' wire:model.change='form.kecamatan'>
                        <option value="-" selected>--Pilih Kecamatan--</option>
                        @foreach ($this->kecamatanOption as $kec)
                            <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                        @endforeach
                    </x-select>


                    <x-select label='Desa/Kelurahan' key='desa_kel' wire:model.change='form.desa_kel'>
                        <option value="-" selected>--Pilih Desa--</option>
                        @foreach ($this->desaOption as $ds)
                            <option value="{{ $ds->id }}">{{ $ds->name }}</option>
                        @endforeach
                    </x-select>

                    <x-input key='dusun' label="Dusun" wire:model.blur='form.dusun' />

                    <x-input key='alamat' label="Alamat" wire:model.blur='form.alamat' />

                    <x-input key='latitude' label="Latitude" wire:model.blur='form.latitude' />

                    <x-input key='longitude' label="Longitude" wire:model.blur='form.longitude' />

                    <x-input key='ketinggian' label="Ketinggian (mdpl)" wire:model.blur='form.ketinggian' />

                    <x-input key='bahan_bangunan' label="Bahan Bangunan" wire:model.blur='form.bahan_bangunan' />

                    <x-input key='satuan_waktu' label="Satuan Waktu" wire:model.blur='form.satuan_waktu' />

                    <x-input key='priode_waktu' label="Priode Waktu" wire:model.blur='form.priode_waktu' />

                    <x-input key='waktu_pembuatan' label="Waktu Pembuatan" wire:model.blur='form.waktu_pembuatan' />

                    <x-input key='ornamen_bangunan' label="Ornamen Bangunan" wire:model.blur='form.ornamen_bangunan' />

                    <x-input key='tanda_bangunan' label="Tanda Bangunan" wire:model.blur='form.tanda_bangunan' />

                    <x-input key='warna_bangunan' label="Warna Bangunan" wire:model.blur='form.warna_bangunan' />

                    <x-input key='panjang' label="Panjang" wire:model.blur='form.panjang' />

                    <x-input key='lebar' label="Lebar" wire:model.blur='form.lebar' />

                    <x-input key='tinggi' label="Tinggi" wire:model.blur='form.tinggi' />

                    <x-input key='luas_bangunan' label="Luas Bangunan" wire:model.blur='form.luas_bangunan' />

                    <x-input key='luas_tanah' label="Luas Tanah" wire:model.blur='form.luas_tanah' />
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Selanjutnya</button>
                </div>
            </form>
        @endif

        @if ($step == 2)
            <form wire:submit.prevent='nextStep'>
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                    <x-input key='status_kepemilikan' label="Status Kepemilikan"
                        wire:model.blur='form.status_kepemilikan' />

                    <x-input key='nama_pemilik' label="Nama Pemilik" wire:model.blur='form.nama_pemilik' />

                    <x-input key='status_perolehan' label="Status Perolehan" wire:model.blur='form.status_perolehan' />

                    <x-input key='keutuhan' label="Keutuhan" wire:model.blur='form.keutuhan' />

                    <x-select label='Provinsi Pemilik' key='provinsi_pemilik'
                        wire:model.change='form.provinsi_pemilik'>
                        <option value="-" selected>--Pilih Provinsi--</option>
                        @foreach ($this->provinsiOptionPemilik as $provinsi)
                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                        @endforeach
                    </x-select>


                    <x-select label='Kabupaten Pemilik' key='kabupaten_pemilik'
                        wire:model.change='form.kabupaten_pemilik'>
                        <option value="-" selected>--Pilih Kabupaten--</option>
                        @foreach ($this->kabupatenOptionPemilik as $kab)
                            <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                        @endforeach
                    </x-select>


                    <x-select label='Kecamatan Pemilik' key='kecamatan_pemilik'
                        wire:model.change='form.kecamatan_pemilik'>
                        <option value="-" selected>--Pilih Kecamatan--</option>
                        @foreach ($this->kecamatanOptionPemilik as $kec)
                            <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                        @endforeach
                    </x-select>

                    <x-select label='Desa/Kelurahan Pemilik' key='desa_kel_pemilik'
                        wire:model.change='form.desa_kel_pemilik'>
                        <option value="-" selected>--Pilih Desa--</option>
                        @foreach ($this->desaOptionPemilik as $ds)
                            <option value="{{ $ds->id }}">{{ $ds->name }}</option>
                        @endforeach
                    </x-select>

                    <x-input key='alamat_pemilik' label="Alamat Pemilik" wire:model.blur='form.alamat_pemilik' />

                    <x-input key='latitude_pemilik' label="Latitude Pemilik"
                        wire:model.blur='form.latitude_pemilik' />

                    <x-input key='longitude_pemilik' label="Longitude Pemilik"
                        wire:model.blur='form.longitude_pemilik' />

                    <x-input key='pemeliharaan' label="Pemeliharaan" wire:model.blur='form.pemeliharaan' />

                    <x-input key='pemugaran' label="Pemugaran" wire:model='form.pemugaran' />

                    <x-input key='adaptasi' label="Adaptasi" wire:model='form.adaptasi' />

                    <x-input key='zona_utara' label="Zona Utara" wire:model.blur='form.zona_utara' />

                    <x-input key='zona_selatan' label="Zona Selatan" wire:model.blur='form.zona_selatan' />

                    <x-input key='zona_barat' label="Zona Barat" wire:model.blur='form.zona_barat' />

                    <x-input key='zona_timur' label="Zona Timur" wire:model.blur='form.zona_timur' />

                </div>
                <div class="d-flex justify-content-between">
                    <button wire:click.prevent='prevStep' type="button"
                        class="btn btn-secondary">Sebelumnya</button>
                    <button type="submit" class="btn btn-success">Selanjutnya</button>
                </div>
            </form>
        @endif

        @if ($step == 3)
            <form wire:submit.prevent='nextStep'>
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                    <x-input key='tingkatan_data' label="Tingkatan Desa" wire:model.blur='form.tingkatan_data' />

                    <x-input key='tahun_pendataan' label="Tahun Pendataan" wire:model.blur='form.tahun_pendataan'
                        type="number" />

                    <x-input key='tahun_verifikasi' label="Tahun Verifikasi" type="number"
                        wire:model.blur='form.tahun_verifikasi' />

                    <x-input key='tahun_penetapan' label="Tahun Penetapan" wire:model.blur='form.tahun_penetapan'
                        type="number" />

                    <x-input key='entitas_kebudayaan' label="Entitas Kebudayaan"
                        wire:model.blur='form.entitas_kebudayaan' />

                    <x-input key='kategori' label="Kategori" wire:model.blur='form.kategori' />

                    <x-input key='status_pengelolaan' label="Status Pengelolaan"
                        wire:model.blur='form.status_pengelolaan' />

                    <x-input key='video' label="Link Video" wire:model.blur='form.video' />
                </div>

                <x-textarea key='deskripsi' label='Deskripsi' wire:model.blur='form.deskripsi' />
                {{--
                <div class="row row-cols-2">
                    <div class="col">
                        <x-input-file accept=".doc,.docx,.clx,.csv,.pdf" key='dokumen' label="Dokumen"
                            wire:model.blur='form.dokumen' :data="$form->dokumen" />

                    </div>
                </div> --}}


                <div class="d-flex justify-content-between mt-3">
                    <button wire:click.prevent='prevStep' type="button"
                        class="btn btn-secondary">Sebelumnya</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        @endif
    </x-card>
</div>
