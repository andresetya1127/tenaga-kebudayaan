<div class="col-12">
    <x-page-title :page="$page" />

    <div class="mt-2 mb-3 d-flex justify-content-between align-items-center">
        <x-link :href="route('index.cagar_budaya')">
            <i class="fa fa-arrow-left"></i> Kembali
        </x-link>
        <button type="button" class="btn  {{ $disable ? 'btn-danger' : 'btn-success' }}" data-bs-toggle="tooltip"
            wire:click="setDisable()" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
            data-bs-title="Klik Untuk Mengubah Data.">
            <i class="fa fa-pencil"></i>
        </button>
    </div>
    <div class="my-2">
        <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $step == 1 ? 'active' : '' }}" wire:click="setStep(1)">
                    <span class="nav-text">Tahap 1</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $step == 2 ? 'active' : '' }}" wire:click="setStep(2)">
                    <span class="nav-text">Tahap 2</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $step == 3 ? 'active' : '' }}" wire:click="setStep(3)">
                    <span class="nav-text">Tahap 3</span>
                </a>
            </li>
        </ul>
    </div>

    <x-card>
        @if ($step == 1)
            <div class="row row-cols-lg-4  row-cols-2">
                <x-select :disable="$disable" :error="$errors->has('jenis_cb')" label='Jenis Cagar' key=jenis_cb
                    wire:model.change='form.jenis_cb'>
                    <option value="" selected>--Pilih Jenis Cagar--</option>
                    <option value="Benda" selected>Benda</option>
                    <option value="Tak Benda" selected>Tak Benda</option>
                </x-select>

                <x-input :disable="$disable" :error="$errors->has('nama_cagar')" key='nama_cagar' label="Nama Cagar"
                    wire:model.blur='form.nama_cagar' />

                <x-input :disable="$disable" :error="$errors->has('sifat_bangunan')" key='sifat_bangunan' label="Sifat Bangunan"
                    wire:model.blur='form.sifat_bangunan' />

                <x-input :disable="$disable" :error="$errors->has('priode_bangunan')" key='priode_bangunan' label="Priode Bangunan"
                    wire:model.blur='form.priode_bangunan' />

                <x-input :disable="$disable" :error="$errors->has('gaya_arsitektur')" key='gaya_arsitektur' label="Gaya Arsitektur Bangunan"
                    wire:model.blur='form.gaya_arsitektur' />

                <x-input :disable="$disable" :error="$errors->has('fungsi_bangunan')" key='fungsi_bangunan' label="Fungsi Bangunan"
                    wire:model.blur='form.fungsi_bangunan' />

                <x-input :disable="$disable" :error="$errors->has('bentuk_atap')" key='bentuk_atap' label="Bentuk Atap Bangunan"
                    wire:model.blur='form.bentuk_atap' />

                <x-select :disable="$disable" label='Kabupaten' key='kabupaten' wire:model.change='form.kabupaten'>
                    <option value="-" selected>--Pilih Kabupaten--</option>
                    @foreach ($this->kabupatenOption as $kab)
                        <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                    @endforeach
                </x-select>


                <x-select :disable="$disable" label='Kecamatan' key='kecamatan' wire:model.change='form.kecamatan'>
                    <option value="-" selected>--Pilih Kecamatan--</option>
                    @foreach ($this->kecamatanOption as $kec)
                        <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                    @endforeach
                </x-select>


                <x-select :disable="$disable" label='Desa/Kelurahan' key='desa_kel' wire:model.change='form.desa_kel'>
                    <option value="-" selected>--Pilih Desa--</option>
                    @foreach ($this->desaOption as $ds)
                        <option value="{{ $ds->id }}">{{ $ds->name }}</option>
                    @endforeach
                </x-select>

                <x-input :disable="$disable" key='dusun' label="Dusun" wire:model.blur='form.dusun' />

                <x-input :disable="$disable" key='alamat' label="Alamat" wire:model.blur='form.alamat' />

                <x-input :disable="$disable" key='latitude' label="Latitude" wire:model.blur='form.latitude' />

                <x-input :disable="$disable" key='longitude' label="Longitude" wire:model.blur='form.longitude' />

                <x-input :disable="$disable" key='ketinggian' label="Ketinggian (mdpl)"
                    wire:model.blur='form.ketinggian' />

                <x-input :disable="$disable" key='bahan_bangunan' label="Bahan Bangunan"
                    wire:model.blur='form.bahan_bangunan' />

                <x-input :disable="$disable" key='satuan_waktu' label="Satuan Waktu Pembuatan"
                    wire:model.blur='form.satuan_waktu' />

                <x-input :disable="$disable" key='priode_waktu' label="Priode Waktu Pembuatan"
                    wire:model.blur='form.priode_waktu' />

                <x-input :disable="$disable" key='waktu_pembuatan' label="Waktu Pembuatan"
                    wire:model.blur='form.waktu_pembuatan' />

                <x-input :disable="$disable" key='ornamen_bangunan' label="Ornamen Bangunan"
                    wire:model.blur='form.ornamen_bangunan' />

                <x-input :disable="$disable" key='tanda_bangunan' label="Tanda Bangunan"
                    wire:model.blur='form.tanda_bangunan' />

                <x-input :disable="$disable" key='warna_bangunan' label="Warna Bangunan"
                    wire:model.blur='form.warna_bangunan' />

                <x-input :disable="$disable" key='panjang' label="Panjang" wire:model.blur='form.panjang' />

                <x-input :disable="$disable" key='lebar' label="Lebar" wire:model.blur='form.lebar' />

                <x-input :disable="$disable" key='tinggi' label="Tinggi" wire:model.blur='form.tinggi' />

                <x-input :disable="$disable" key='luas_bangunan' label="Luas Bangunan"
                    wire:model.blur='form.luas_bangunan' />

                <x-input :disable="$disable" key='luas_tanah' label="Luas Tanah" wire:model.blur='form.luas_tanah' />
            </div>
        @endif

        @if ($step == 2)
            <div class="row row-cols-lg-4  row-cols-2">
                <x-input :disable="$disable" key='status_kepemilikan' label="Status Kepemilikan"
                    wire:model.blur='form.status_kepemilikan' />

                <x-input :disable="$disable" key='nama_pemilik' label="Nama Pemilik"
                    wire:model.blur='form.nama_pemilik' />

                <x-input :disable="$disable" key='status_perolehan' label="Status Perolehan"
                    wire:model.blur='form.status_perolehan' />

                <x-select :disable="$disable" label='Provinsi Pemilik' key='provinsi_pemilik'
                    wire:model.change='form.provinsi_pemilik'>
                    <option value="-" selected>--Pilih Provinsi--</option>
                    @foreach ($this->provinsiOptionPemilik as $kab)
                        <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                    @endforeach
                </x-select>


                <x-select :disable="$disable" label='Kabupaten Pemilik' key='kabupaten_pemilik'
                    wire:model.change='form.kabupaten_pemilik'>
                    <option value="-" selected>--Pilih Kabupaten--</option>
                    @foreach ($this->kabupatenOptionPemilik as $kab)
                        <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                    @endforeach
                </x-select>


                <x-select :disable="$disable" label='Kecamatan Pemilik' key='kecamatan_pemilik'
                    wire:model.change='form.kecamatan_pemilik'>
                    <option value="-" selected>--Pilih Kecamatan--</option>
                    @foreach ($this->kecamatanOptionPemilik as $kec)
                        <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                    @endforeach
                </x-select>


                <x-select :disable="$disable" label='Desa/Kelurahan Pemilik' key='desa_kel_pemilik'
                    wire:model.change='form.desa_kel_pemilik'>
                    <option value="-" selected>--Pilih Desa--</option>
                    @foreach ($this->desaOptionPemilik as $ds)
                        <option value="{{ $ds->id }}">{{ $ds->name }}</option>
                    @endforeach
                </x-select>

                <x-input :disable="$disable" key='alamat_pemilik' label="Alamat Pemilik"
                    wire:model.blur='form.alamat_pemilik' />

                <x-input :disable="$disable" key='latitude_pemilik' label="Latitude Pemilik"
                    wire:model.blur='form.latitude_pemilik' />

                <x-input :disable="$disable" key='longitude_pemilik' label="Longitude Pemilik"
                    wire:model.blur='form.longitude_pemilik' />

                <x-input :disable="$disable" key='keutuhan' label="Keutuhan" wire:model.blur='form.keutuhan' />

                <x-input :disable="$disable" key='pemeliharaan' label="Pemeliharaan"
                    wire:model.blur='form.pemeliharaan' />

                <x-input :disable="$disable" key='pemugaran' label="Pemugaran" wire:model='form.pemugaran' />

                <x-input :disable="$disable" key='adaptasi' label="Adaptasi" wire:model='form.adaptasi' />

                <x-input :disable="$disable" key='zona_utara' label="Zona Utara" wire:model.blur='form.zona_utara' />

                <x-input :disable="$disable" key='zona_selatan' label="Zona Selatan"
                    wire:model.blur='form.zona_selatan' />

                <x-input :disable="$disable" key='zona_barat' label="Zona Barat" wire:model.blur='form.zona_barat' />

                <x-input :disable="$disable" key='zona_timur' label="Zona Timur" wire:model.blur='form.zona_timur' />

            </div>
        @endif

        @if ($step == 3)
            <div class="row row-cols-lg-4 row-cols-2">
                <x-input :disable="$disable" key='tingkatan_data' label="Tingkatan Desa"
                    wire:model.blur='form.tingkatan_data' />

                <x-input type="number" :disable="$disable" key='tahun_pendataan' label="Tahun Pendataan"
                    wire:model.blur='form.tahun_pendataan' />

                <x-input :disable="$disable" type="number" key='tahun_verifikasi' label="Tahun Verifikasi"
                    wire:model.blur='form.tahun_verifikasi' />

                <x-input :disable="$disable" type="number" key='tahun_penetapan' label="Tahun Penetapan"
                    wire:model.blur='form.tahun_penetapan' />

                <x-input :disable="$disable" key='entitas_kebudayaan' label="Entitas Kebudayaan"
                    wire:model.blur='form.entitas_kebudayaan' />

                <x-input :disable="$disable" key='kategori' label="Kategori" wire:model.blur='form.kategori' />

                <x-input :disable="$disable" key='status_pengelolaan' label="Status Pengelolaan"
                    wire:model.blur='form.status_pengelolaan' />

                <x-input :disable="$disable" key='video' label="Link Video" wire:model.blur='form.video' />

            </div>

            <x-textarea :disable="$disable" key='deskripsi' label='Deskripsi' wire:model.blur='form.deskripsi' />



            {{-- @if (!$disable)
                <div class="row mt-5">
                    <div class="col-lg-3 col-12">
                        <label for="">Dokumen</label>

                        @if (empty($form->dokumen))
                            <x-input-file accept=".doc,.docx,.clx,.csv,.pdf" key='dokumen'
                                wire:model.blur='form.dokumen' />
                        @else
                            <div class="border border-primary p-5 rounded text-center my-3">
                                <p class="text-nowrap text-ellips-0" target="_blank">
                                    {{ $form->dokumen }}
                                </p>

                                <div class="mt-1">
                                    <button class="btn btn-success btn-sm" wire:click='download'>
                                        <i class="fa fa-download"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-delete" onclick="return confirmAction()">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-9 col-12">
                        <label for="">Foto</label>
                        <x-upload-image :data="$form->imgPush" key="foto" update="true" model="form.foto" />
                    </div>
                </div>
            @endif --}}
        @endif

    </x-card>
</div>




@push('script')
    <script>
        function confirmAction() {
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
                    @this.confirmDelete()
                }
            })
        }
    </script>
@endpush
