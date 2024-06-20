<div class="container my-5 ">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('landing.odcb') }}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>
                Kembali</a>
        </div>

        <div class="col-12 col-lg-6 m-auto d-flex justify-content-center">
            <x-slide-thumbnail :data="$detail->foto" />
        </div>

        <div class="col-12">

            <div class="text-center d-flex justify-content-center mb-4">
                <a href="https://www.youtube.com/{{ $detail->video }}" target="_blank">
                    <div class="sosial-media">
                        <div class="sosial-icon" style="background: rgb(248, 37, 37);">
                            <i class="fa-brands fa-youtube"></i>
                        </div>
                        <div class="sosial-content-body" style="background: rgb(248, 37, 37);">
                            <span class="text-white fw-bold"> Youtube : {{ $detail->nama_cagar }} </span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- CUSTOM BLOCKQUOTE -->
            <x-quote :title="$detail->nama_cagar">
                {{ $detail->deskripsi }}
            </x-quote>

            <div class="row mt-4 g-5">

                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Informasi">
                        <x-list-detail title="Tingkatan Data" :text="$detail->tingkatan_data" />
                        <x-list-detail title="tahun Pendataan" :text="$detail->tahun_pendataan" />
                        <x-list-detail title="Tahun verifikasi dan validasi" :text="$detail->tahun_verifikasi" />
                        <x-list-detail title="Tahun penetapan" :text="$detail->tahun_penetapan" />
                        <x-list-detail title="Entitas kebudayaan" :text="$detail->entitas_kebudayaan" />
                        <x-list-detail title="Kategori" :text="$detail->kategori" />
                        <x-list-detail title="Status pengelolaan" :text="$detail->status_pengelolaan" />

                    </x-card-custom>
                </div>

                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Data Benda">
                        <x-list-detail title="Nama ODCB di lapangan" text="Belum Di Set " />
                        <x-list-detail title="Sifat bangunan" :text="$detail->sifat_bangunan" />
                        <x-list-detail title="Periode bangunan" :text="$detail->priode_bangunan" />
                        <x-list-detail title="Gaya arsitektur bangunan" :text="$detail->gaya_arsitektur" />
                        <x-list-detail title="Fungsi bangunan" :text="$detail->fungsi_bangunan" />
                        <x-list-detail title="Bentuk atap bangunan" :text="$detail->bentuk_atap" />

                    </x-card-custom>
                </div>

                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Lokasi Penemuan">
                        <x-list-detail title="Provinsi" :text="$detail->prov->name ?? '-'" />
                        <x-list-detail title="Kabupaten/Kota" :text="$detail->kab->name ?? '-'" />
                        <x-list-detail title="Kecamatan" :text="$detail->kec->name ?? '-'" />
                        <x-list-detail title="Desa/Kelurahan" :text="$detail->desaKel->name ?? '-'" />
                        <x-list-detail title="Alamat" :text="$detail->alamat" />
                        <x-list-detail title="Latitude" :text="$detail->latitude" />
                        <x-list-detail title="Longitude" :text="$detail->longitude" />
                        <x-list-detail title="Ketinggian (mdpl)" :text="$detail->ketinggian" />
                    </x-card-custom>
                </div>

                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Data Fisik">
                        <x-list-detail title="Bahan bangunan" :text="$detail->bahan_bangunan" />
                        <x-list-detail title="Satuan waktu pembuatan" :text="$detail->satuan_waktu" />
                        <x-list-detail title="Periode waktu pembuatan" :text="$detail->priode_waktu" />
                        <x-list-detail title="Waktu pembuatan" :text="$detail->waktu_pembuatan" />
                        <x-list-detail title="Ornamen bangunan" :text="$detail->ketinggian" />
                        <x-list-detail title="Tanda bangunan" :text="$detail->tanda_bangunan" />
                        <x-list-detail title="Warna bangunan" :text="$detail->warna_bangunan" />
                    </x-card-custom>
                </div>

                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Data DImensi">
                        <x-list-detail title="Panjang" :text="$detail->panjang" />
                        <x-list-detail title="Lebar" :text="$detail->lebar" />
                        <x-list-detail title="Tinggi" :text="$detail->tinggi" />
                        <x-list-detail title="Luas bangunan" :text="$detail->luas_bangunan" />
                        <x-list-detail title="Luas tanah" :text="$detail->luas_tanah" />
                    </x-card-custom>
                </div>

                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Kondisi Terkini">
                        <x-list-detail title="Keutuhan" :text="$detail->keutuhan" />
                        <x-list-detail title="Pemeliharaan" :text="$detail->pemeliharaan" />
                        <x-list-detail title="Pemugaran" :text="$detail->pemugaran" />
                        <x-list-detail title="Adaptasi" :text="$detail->adaptasi" />
                    </x-card-custom>
                </div>

                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Data Kepemilikan">
                        <x-list-detail title="Status kepemilikan" :text="$detail->status_kepemilikan" />
                        <x-list-detail title="Nama pemilik" :text="$detail->nama_pemilik" />
                        <x-list-detail title="Status perolehan" :text="$detail->status_perolehan" />
                        <x-list-detail title="Provinsi" :text="$detail->provPemilik->name ?? '-'" />
                        <x-list-detail title="Kabupaten/Kota" :text="$detail->kabPemilik->name ?? '-'" />
                        <x-list-detail title="Kecamatan" :text="$detail->kecPemilik->name ?? '-'" />
                        <x-list-detail title="Desa/kelurahan" :text="$detail->desaPemilik->name ?? '-'" />
                        <x-list-detail title="Alamat" :text="$detail->alamat_pemilik" />
                        <x-list-detail title="Latitude" :text="$detail->latitude" />
                        <x-list-detail title="Longitude" :text="$detail->longitude" />
                    </x-card-custom>
                </div>

                <div class="col-xl-6 col-12 ">
                    <x-card-custom class="body-title" title="Batas Zona">
                        <x-list-detail title="Batas zona utara" :text="$detail->zona_utara" />
                        <x-list-detail title="Batas zona selatan" :text="$detail->zona_selatan" />
                        <x-list-detail title="Batas zona barat" :text="$detail->zona_barat" />
                        <x-list-detail title="Barat zona timur" :text="$detail->zona_timur" />
                    </x-card-custom>
                </div>
            </div>
        </div>
    </div>
</div>
