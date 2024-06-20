<div class="col-12">
    <form wire:submit='setKomponenDetail'>
        <div class="row p-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h5>{{ $page }}</h5>
                <button type="submit" class="btn btn-success text-white">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>

            <div class="col-xxl-4">
                <!--Nama Objek-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Nama Objek</x-title>

                        <x-input-error key="nama_objek"></x-input-error>
                        <x-status check="{{ $form->nama_objek }}" key="nama_objek"></x-status>

                        <div x-show="open">
                            <x-input wire:model.live='form.nama_objek' place="Masukkan Kategori Objek.."></x-input>
                        </div>
                    </div>
                </x-card>

                <!--Kategori Objek-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Kategori Objek </x-title>
                        <x-input-error key="kategori_objek"></x-input-error>

                        @empty(!$form->kategori_objek)
                            <x-badge>{{ $form->kategori_objek }}</x-badge>
                        @endempty

                        <div x-show="open">
                            @foreach ($data['kategori_objek'] as $ktg)
                                <x-radio value="{{ $ktg }}"
                                    wire:model.live='form.kategori_objek'>{{ $ktg }}</x-radio>
                            @endforeach
                        </div>
                    </div>
                </x-card>

                <!--Kondisi -->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Kondisi </x-title>
                        <x-input-error key="kondisi"></x-input-error>

                        @empty(!$form->kondisi)
                            <x-badge>{{ $form->kondisi }}</x-badge>
                        @endempty

                        <div x-show="open">
                            @foreach ($data['kondisi'] as $ktg)
                                <x-radio value="{{ $ktg }}"
                                    wire:model.live='form.kondisi'>{{ $ktg }}</x-radio>
                            @endforeach
                        </div>
                    </div>
                </x-card>

                <!--Nama Pemilik-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Nama Pemilik/Pengelola </x-title>
                        <x-input-error key='nama_pemilik'></x-input-error>

                        @empty(!$form->nama_pemilik)
                            <x-badge>{{ $form->nama_pemilik }}</x-badge>
                        @endempty

                        <div x-show="open">
                            <x-input wire:model.live='form.nama_pemilik'
                                place="Masukkan nama pemilik/pengelola.."></x-input>
                        </div>
                    </div>
                </x-card>

                <!--Alamat Pemilik-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Alamat Pemilik Sesuai KTP </x-title>
                        <x-input-error key="alamat"></x-input-error>

                        @empty(!$form->alamat)
                            <x-badge>{{ $form->alamat }}</x-badge>
                        @endempty

                        <div x-show="open">
                            <x-textarea place="Masukkan alamat pemilik.." wire:model.live='form.alamat'></x-textarea>
                        </div>
                    </div>
                </x-card>

                <!--Riwayat Pemilik-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Riwayat Kepemilikan </x-title>
                        <p class="c-grey-600 m-0">(Berisi asal usul warisan, pembelian, hibah, hadiah, titipan,
                            sitaan dll)</p>
                        <x-input-error key="riwayat"></x-input-error>

                        @empty(!$form->riwayat)
                            <x-badge>Done</x-badge>
                        @endempty

                        <div x-show="open">
                            <div wire:ignore>
                                <textarea class="summernote" wire:model.live='form.riwayat'></textarea>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>

            <div class="col-xxl-4">
                <!--Koordinat Objek-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Koordinat </x-title>
                        <x-input-error key='koordinat'></x-input-error>

                        <x-status check="{{ $form->koordinat }}" key="koordinat"></x-status>

                        <div x-show="open">
                            <x-input wire:model.live='form.koordinat' place="Masukkan Kordinat.."></x-input>
                        </div>
                    </div>
                </x-card>

                <!--Keberadaan Objek-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Keberadaan Objek </x-title>
                        <x-input-error key='keberadaan_objek'></x-input-error>

                        @empty(!$form->keberadaan_objek)
                            <x-badge>{{ $form->keberadaan_objek }}</x-badge>
                        @endempty

                        <div x-show="open">
                            @foreach ($data['keberadaan_objek'] as $ktg)
                                <x-radio value="{{ $ktg }}"
                                    wire:model.live='form.keberadaan_objek'>{{ $ktg }}</x-radio>
                            @endforeach
                        </div>
                    </div>
                </x-card>

                <!--Lokasi Penyimpanan-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Lokasi Penyimpanan </x-title>
                        <x-input-error key='lokasi_penyimpanan'></x-input-error>

                        @empty(!$form->lokasi_penyimpanan)
                            <x-badge>{{ $form->lokasi_penyimpanan }}</x-badge>
                        @endempty

                        <div x-show="open">
                            @foreach ($data['lokasi_penyimpanan'] as $ktg)
                                <x-radio value="{{ $ktg }}"
                                    wire:model.live='form.lokasi_penyimpanan'>{{ $ktg }}</x-radio>
                            @endforeach
                        </div>
                    </div>
                </x-card>

                <!--Batas Lainnya-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Batas-batas Lainnya </x-title>
                        <p class="c-grey-600 m-0">Kategori Selain Benda</p>
                        <x-input-error key='batas_lain'></x-input-error>

                        @empty(!$form->batas_lain)
                            <x-badge>{{ $form->batas_lain }}</x-badge>
                        @endempty

                        <div x-show="open">
                            @foreach ($data['batas_lain'] as $ktg)
                                <x-radio value="{{ $ktg }}"
                                    wire:model.live='form.batas_lain'>{{ $ktg }}</x-radio>
                            @endforeach
                        </div>
                    </div>
                </x-card>


                <!--Latar Sejarah -->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Latar Sejarah </x-title>
                        <x-input-error key='latar_sejarah'></x-input-error>

                        @empty(!$form->latar_sejarah)
                            <x-badge>Done</x-badge>
                        @endempty

                        <div x-show="open">
                            <div wire:ignore>
                                <textarea class="summernote" wire:model.live='form.latar_sejarah'></textarea>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>

            <div class="col-xxl-4">

                <!--Ukuran-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Ukuran </x-title>
                        <x-input-error key='ukuran'></x-input-error>

                        @empty(!$form->ukuran)
                            <x-badge>{{ $form->ukuran }}</x-badge>
                        @endempty

                        <div x-show="open">
                            @foreach ($data['ukuran'] as $ktg)
                                <x-radio value="{{ $ktg }}"
                                    wire:model.live='form.ukuran'>{{ $ktg }}</x-radio>
                            @endforeach
                        </div>
                    </div>
                </x-card>

                <!--Bahan Utama-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Bahan Utama </x-title>
                        <x-input-error key='bahan_utama'></x-input-error>

                        @empty(!$form->bahan_utama)
                            <x-badge>{{ $form->bahan_utama }}</x-badge>
                        @endempty

                        <div x-show="open">
                            @foreach ($data['bahan_utama'] as $ktg)
                                @if ($ktg == 'Lainnya')
                                    <x-radio value="{{ $ktg }}" wire:click="$toggle('tgl_bahan')"
                                        wire:model.live='form.bahan_utama'>{{ $ktg }}</x-radio>
                                @else
                                    <x-radio value="{{ $ktg }}" wire:click="$set('tgl_bahan',false)"
                                        wire:model.live='form.bahan_utama'>{{ $ktg }}</x-radio>
                                @endif
                            @endforeach

                            <x-input wire:keyup="$set('form.bahan_utama',$event.target.value)"
                                cls="{{ $tgl_bahan ? '' : 'd-none' }}"
                                place="Masukkan bahan utama lainnya.."></x-input>
                        </div>
                    </div>
                </x-card>

                <!--Deskripsi-->
                <x-card>
                    <div x-data="{ open: true }">
                        <x-title @click="open =  !open">Deskripsi </x-title>
                        <x-input-error key='deskripsi'></x-input-error>

                        @empty(!$form->deskripsi)
                            <x-badge>Done</x-badge>
                        @endempty

                        <div x-show="open">
                            <div wire:ignore>
                                <textarea class="summernote" wire:model.live='form.deskripsi'></textarea>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('.summernote').summernote({
            placeholder: 'Ketikkan sesuatu disini.',
            tabsize: 2,
            height: 180,
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set($(this).attr('wire:model.live'), contents);
                }
            },
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
</div>
