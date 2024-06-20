<div class="col-12">
    <x-page-title :page="$page" />

    <form wire:submit='update'>
        <div class="text-end mt-3 mb-2">
            <button type="submit" class="btn btn-success text-white">
                <div wire:loading>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span class="visually-hidden" role="status">Loading...</span>
                </div> Simpan
            </button>
        </div>



        <x-card>
            <x-upload-image :data="$form->imgPush" key="foto" model="form.foto" update />
        </x-card>

        <x-card>
            <div class="row row-cols-lg-2 row-cols-1">
                <!--Nama-->
                <x-input type="text" key="nama_lembaga" wire:model='form.nama_lembaga'
                    label="nama Lembaga/Komunitas" />

                <!--Nama Ketua-->
                <x-input type="text" key="nama_ketua" wire:model='form.nama_ketua' label="nama Ketua" />

                <!--No kontak Ketua-->
                <x-input type="number" key="no_ketua" wire:model='form.no_ketua' label="No. Hp/Wa Ketua" />

                <!--NIK Ketua-->
                <x-input type="number" key="nik_ketua" wire:model='form.nik_ketua' label="NIK Ketua" />

                <!--Tanggal Pendirian-->
                <x-input type="date" key="tgl_pendirian" wire:model='form.tgl_pendirian' label="Tanggal Pendirian" />

                <!--Jumlah Anggota-->
                <x-input type='number' key="jumlah_anggota" wire:model='form.jumlah_anggota' label="Jumlah Anggota" />

                <!--No Akte-->
                <x-input type="text" key="akte_pendirian" wire:model='form.akte_pendirian'
                    label="No Akte Pendirian *(Jika Ada)" />

                <!--No NPWP-->
                <x-input type="text" key="npwp" wire:model='form.npwp' label="No NPWP *(Jika Ada)" />

                <!--Kecamatan-->
                <x-select key="kecamatan" label="Kecamatan" wire:model.live='form.kecamatan'>
                    <option selected>Pilih Kecamatan</option>
                    @forelse ($kecamatan as $kec)
                        <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                    @empty
                    @endforelse
                </x-select>

                <!--Desa-->
                <x-select key="desa" label="Desa" wire:model.live='form.desa'>
                    <option selected>Pilih Desa</option>
                    @forelse ($desa as $des)
                        <option value="{{ $des->id }}">{{ $des->name }}</option>
                    @empty
                    @endforelse
                </x-select>

                <x-input tp='text' key="longitude" wire:model='form.longitude' label="Longitude" />

                <x-input tp='text' key="latitude" wire:model='form.latitude' label="Latitude" />

                <!--No NPWP-->
                <x-input type="text" key="alamat_sekretariat" wire:model='form.alamat_sekretariat'
                    label="Alamat Sekretariat" />
            </div>
        </x-card>


        <x-card>
            <h6 class="mb-3">Jenis Lembaga/Komunitas</h6>
            <div class="row gy-4">
                @foreach ($data as $dt)
                    <div class="col-lg-auto">
                        <x-radio value="{{ $dt }}" wire:model='form.jenis_lembaga' key="jenis_lembaga"
                            :label="$dt" />
                    </div>
                @endforeach
                <x-input wire:model='form.jenis_lembaga' place="Lainnya" />
            </div>

            <x-default-error key="jenis_lembaga"></x-default-error>

        </x-card>

        <x-card>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <!--Susunan Pengurus-->
                    <div class="col">
                        <x-title>Susunan Pengurus</x-title>
                        <div wire:ignore>
                            <textarea class="summernote" wire:model='form.susunan_pengurus'>{{ $form->susunan_pengurus ?? '' }}</textarea>
                        </div>
                        <x-default-error key='susunan_pengurus'></x-default-error>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!--Uraian Aktivitas-->
                    <div class="col">
                        <x-title>Uraian Aktivitas</x-title>
                        <div wire:ignore>
                            <textarea class="summernote" wire:model='form.uraian_aktivitas'>{{ $form->uraian_aktivitas ?? '' }}</textarea>
                        </div>
                        <x-default-error key='uraian_aktivitas'></x-default-error>
                    </div>
                </div>
            </div>
        </x-card>

        <!--Social Media-->
        <x-card>
            <div class="row row-cols-lg-2 row-cols-1 g-3">
                <!--Email-->
                <x-input type="text" label="Email" key="email" wire:model='form.email' label="Email" />

                <!--Facebook-->
                <x-input type="text" label="Facebook" key="facebook" wire:model='form.facebook' label="Nama" />

                <!--Instagram-->
                <x-input type="text" label="Instagram" key="instagram" wire:model='form.instagram' label="Nama" />

                <!--Youtube-->
                <x-input type="text" label="Youtube" key="youtube" wire:model='form.youtube'
                    label="Link Youtube" />
            </div>
        </x-card>
    </form>

    @push('style')
        <x-css asset='summernote'></x-css>
    @endpush

    @push('script')
        <x-script asset='summernote'></x-script>
        <script>
            $('.summernote').on('summernote.change', function(we, contents, $editable) {
                @this.set($(this).attr('wire:model'), contents);
            })
        </script>
    @endpush
</div>
