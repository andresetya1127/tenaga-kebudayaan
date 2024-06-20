<div class="container my-5 ">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('landing.wbtb') }}" class="btn btn-sm btn-primary"><i class="fa fa-chevron-left"></i>
                Kembali</a>
        </div>


        <div class="col-12 col-lg-6 m-auto d-flex justify-content-center">
            <x-slide-thumbnail :data="$detail->foto" />
        </div>

        <div class="col-12">
            <div class="row my-4 ">
                @if (!empty($detail->youtube))
                    <div class="col-lg-3 m-auto">
                        <div class="sosial-media">
                            <div class="sosial-icon" style="background: rgb(248, 37, 37);">
                                <i class="fa-brands fa-youtube"></i>
                            </div>
                            <a href="https://www.youtube.com/{{ $detail->youtube }}" target="_blank">
                                <div class="sosial-content-body" style="background: rgb(248, 37, 37);">
                                    <span class="text-white fw-bold"> Youtube </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

                @if (!empty($detail->facebook))
                    <div class="col-lg-3 m-auto">
                        <div class="sosial-media">
                            <div class="sosial-icon" style="background: rgb(17, 139, 240);">
                                <i class="fa-brands fa-facebook"></i>
                            </div>
                            <a href="https://www.facebook.com/{{ $detail->facebook }}" target="_blank">

                                <div class="sosial-content-body" style="background: rgb(17, 139, 240);">
                                    <span class="text-white fw-bold"> Facebook </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

                @if (!empty($detail->instagram))
                    <div class="col-lg-3 m-auto">
                        <div class="sosial-media">
                            <div class="sosial-icon" style="background: rgb(201, 5, 113);">
                                <i class="fa-brands fa-instagram"></i>
                            </div>'
                            <a href="https://www.instagram.com/{{ $detail->instagram }}" target="_blank">
                                <div class="sosial-content-body" style="background: rgb(201, 5, 113);">
                                    <span class="text-white fw-bold"> Instagram </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

            </div>


            <div class="row mt-4 g-5">
                <div class="col-12">
                    <!-- CUSTOM BLOCKQUOTE -->
                    <x-quote :title="$detail->nama_warisan">
                        {!! $detail->deskripsi !!}
                    </x-quote>
                </div>
                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Informasi WBTB">
                        <x-list-detail title="Domain WBTb" :text="$detail->domain_wbtb" />
                        <x-list-detail title="Kategori WBTb" :text="$detail->kategori_wbtb" />
                        <x-list-detail title="Tingkatan data" :text="$detail->tingkatan_data" />
                        <x-list-detail title="Tanggal pendataan" :text="$detail->tgl_pendataan" />
                        <x-list-detail title="Tanggal verifikasi dan validasi" :text="$detail->tgl_verifikasi" />
                        <x-list-detail title="Tanggal penetapan" :text="$detail->tgl_penetapan" />
                        <x-list-detail title="Provinsi" :text="$detail->provinsi" />
                        <x-list-detail title="Kabupaten/Kota" :text="$detail->kabupaten" />
                        <x-list-detail title="Sebaran kabupaten/kota" :text="$detail->sebaran_kabupaten" />
                        <x-list-detail title="Entitas kebudayaan" :text="$detail->entitas_kebudayaan" />
                    </x-card-custom>
                </div>

                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Informasi Tambahan">
                        <x-list-detail title="Tanggal penerimaan formulir" :text="$detail->tgl_penerimaan" />
                        <x-list-detail title="Tempat penerimaan formulir" :text="$detail->tempat_penerimaan" />
                        <x-list-detail title="Nama petugas penerimaan formulir" :text="$detail->nama_petugas" />
                        <x-list-detail title="Nama Lembaga" :text="$detail->nama_lembaga" />
                        <x-list-detail title="Nama SDM Kebudayaan" :text="$detail->nama_sdm" />
                        <x-list-detail title="Wilayah atau level administrasi" :text="$detail->wilayah_level" />
                        <x-list-detail title="Kondisi sekarang" :text="$detail->kondisi_sekarang" />
                        <x-list-detail title="Nama objek OPK" :text="$detail->nama_objek" />
                    </x-card-custom>
                </div>
            </div>
        </div>
    </div>
</div>
