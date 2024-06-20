<div class="container my-5 ">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('landing.lembaga-komunitas') }}" class="btn btn-sm btn-primary"><i
                    class="fa fa-chevron-left"></i>
                Kembali</a>
        </div>

        <div class="col-12 col-lg-6 m-auto d-flex justify-content-center">
            <x-slide-thumbnail :data="$detail->foto" />
        </div>

        <div class="col-12">
            <div class="row my-4 ">

                @if (!empty($detail->video))
                    <div class="col-lg-3 m-auto">
                        <div class="sosial-media">
                            <div class="sosial-icon" style="background: rgb(248, 37, 37);">
                                <i class="fa-brands fa-youtube"></i>
                            </div>
                            <a href="https://www.youtube.com/{{ $detail->video }}" target="_blank">
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
                    <x-quote :title="$detail->nama_lembaga" />
                </div>
                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Uraian Aktivitas">
                        {!! $detail->uraian_aktivitas !!}
                    </x-card-custom>
                </div>
                <div class="col-xl-6 col-12">
                    <x-card-custom class="body-title" title="Susunan Pengurus">
                        {!! $detail->susunan_pengurus !!}
                    </x-card-custom>
                </div>
                <div class="col-xl-6 col-12 mx-auto">
                    <x-card-custom class="body-title" title="Informasi">
                        <x-list-detail title="Ketua" :text="$detail->nama_pencipta" />
                        <x-list-detail title="Jenis Lembaga" :text="$detail->jenis_lembaga" />
                        <x-list-detail title="Tanggal Pendirian" :text="$detail->tgl_pendirian" />
                        <x-list-detail title="Alamat Sekretariat" :text="$detail->alamat_sekretariat" />
                        <x-list-detail title="Jumlah Anggota" text="">
                            <span class="badge badge-primary">
                                <i class="fa fa-users"></i> {{ $detail->jumlah_anggota }}</span>
                        </x-list-detail>
                    </x-card-custom>
                </div>
            </div>
        </div>
    </div>
</div>
