<div class="col-12">

    @if (Auth::user()->role == 1)

        @php
            $karyaBudaya = $widget['Karya Budaya']['data']->where('status', 0)->latest()->paginate(10);
            $karyaSeni = $widget['Karya Seni']['data']->where('status', 0)->latest()->paginate(10);
        @endphp

        <x-alert-card />


        @if (!$dataModal)
            <div class="row row-cols-2 row-cols-lg-4">
                @foreach ($widget as $key => $val)
                    <div class="col">
                        <a href="{{ $val['route'] }}">
                            <div class="card mb-3 widget-content bg-info">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">{{ $key }}</div>
                                        <div class="widget-subheading">
                                            Total {{ $key }}
                                        </div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white">
                                            <span>{{ count($val['data']->get()) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($dataModal)
            <div class="row animate__animated animate__backInRight">
                <div class="col-lg-6 m-auto">
                    <x-card>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-primary" wire:click="resetKey()">
                                <i class="fa-solid fa-angle-left"></i> Kembali
                            </button>
                            <div class="">
                                <button class="btn btn-sm btn-danger" onclick="return rejectAction()">
                                    Tolak <i class="fa-solid fa-ban"></i>
                                </button>
                                <button class="btn btn-sm btn-success" onclick="return confirmAction()">
                                    Konfirmasi <i class="fa-solid fa-circle-check"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Isi Detail --}}
                        <div class="mt-5">
                            <x-list-detail title="Nama Karya" :text="$dataModal->nama_karya ?? $dataModal->judul" />
                            <x-list-detail title="Nama Pencipta" :text="$dataModal->nama_pencipta" />
                            <x-list-detail title="No. Hp Pelestari" :text="$dataModal->no_hp_pelestari" />
                            <x-list-detail title="Alamat" :text="$dataModal->alamat" />
                            <x-list-detail title="NIK" :text="$dataModal->nik" />
                            <x-list-detail title="Email" :text="$dataModal->email" />
                            <x-list-detail title="Jenis Karya" :text="$dataModal->jenis_karya ?? $dataModal->cabang_seni" />
                            <x-list-detail title="Asal Daerah" :text="$dataModal->asal_daerah" />
                            <x-list-detail title="Tahun Tercipta" :text="$dataModal->tahun_tercipta" />
                            <x-list-detail title="Jumlah Pendukung">
                                <span class="badge bg-primary">{{ $dataModal->jumlah_pendukung }}</span>
                            </x-list-detail>

                            <label for="" class="form-label mt-3 fw-bold">Sinopsis</label>
                            <p class="text-muted">
                                {{ $dataModal->sinopsis }}
                            </p>
                            <label for="" class="form-label mt-3 fw-bold">Deskripsi</label>
                            <p class="text-muted">
                                {{ $dataModal->deskripsi_karya }}
                            </p>
                        </div>
                    </x-card>
                </div>
            </div>
        @endif


        @if (!$dataModal)
            <div class="row my-4 animate__animated animate__backInRight">
                <div class="col-12">
                    <x-card>
                        <div class="text-end mb-2">
                            <button class="mb-2 me-2 btn {{ $slide ? 'btn-primary' : 'btn-outline-primary' }}"
                                wire:click="$set('slide',true)">
                                Konfirmasi Karya Budaya
                                <span class="badge bg-warning">
                                    {{ $karyaBudaya->total() }}
                                </span>
                            </button>

                            <button class="mb-2 me-2 btn {{ $slide ? 'btn-outline-primary' : 'btn-primary' }}"
                                wire:click="$set('slide',false)">
                                Konfirmasi Karya Seni
                                <span class="badge bg-warning">
                                    {{ $karyaSeni->total() }}
                                </span>
                            </button>
                        </div>

                        @if ($slide)
                            <h5 class="mb-3">Menunggu Konfirmasi Karya Budaya</h5>
                            <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Karya</th>
                                            <th>Jenis Karya</th>
                                            <th>Nama Pencipta</th>
                                            <th>Asal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($karyaBudaya as $karya)
                                            <tr>
                                                <td class="text-center text-muted">
                                                    {{ $loop->index + $karyaBudaya->firstItem() }}
                                                </td>
                                                <td>{{ $karya->nama_karya }}</td>
                                                <td>{{ $karya->jenis_karya }}</td>
                                                <td>{{ $karya->nama_pencipta }}</td>
                                                <td>{{ $karya->asal_daerah }}</td>
                                                <td>
                                                    <div class="badge bg-warning">Pending</div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-secondary" type="button"
                                                        wire:click="$set('keyBudaya','{{ $karya->id_karya_budaya }}')">
                                                        Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="20" class="text-center">
                                                    Belum Ada Data.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <x-pagination :items="$karyaBudaya" />
                            </div>
                        @else
                            <h5 class="mb-3">Menunggu Konfirmasi Karya Seni</h5>
                            <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Karya</th>
                                            <th>Cabang Karya</th>
                                            <th>Nama Pencipta</th>
                                            <th>Asal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($karyaSeni as $karya)
                                            <tr>
                                                <td class="text-center text-muted">
                                                    {{ $loop->index + $karyaSeni->firstItem() }}
                                                </td>
                                                <td>{{ $karya->judul }}</td>
                                                <td>{{ $karya->cabang_seni }}</td>
                                                <td>{{ $karya->nama_pencipta }}</td>
                                                <td>{{ $karya->asal_daerah }}</td>
                                                <td>
                                                    <div class="badge bg-warning">Pending</div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-secondary" type="button"
                                                        wire:click="$set('keySeni','{{ $karya->id_karya_seni }}')">
                                                        Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="20" class="text-center">
                                                    Belum Ada Data.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <x-pagination :items="$karyaSeni" />
                            </div>
                        @endif
                    </x-card>

                    <!-- Maps -->
                    <x-card>
                        <h4 class="mb-3">Lokasi Cagar Dll</h4>
                        @livewire('maps')
                    </x-card>

                </div>
            </div>
        @endif


        @push('script')
            <script>
                function confirmAction() {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data Ini Akan Di Konfirmasi.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Konfirmas!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Panggil metode untuk melakukan tindakan yang sesuai jika pengguna mengonfirmasi
                            @this.confirmKarya()
                        }
                    })
                }

                function rejectAction() {
                    Swal.fire({
                        input: "textarea",
                        text: "Alasan Ditolak.",
                        inputPlaceholder: "Ketikkan Alasan ditolak.",
                        inputAttributes: {
                            "aria-label": "Type your message here"
                        },
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let msg = result.value;
                            @this.rejectKarya(msg);
                        }
                    });
                }
            </script>
        @endpush
    @endif
</div>
