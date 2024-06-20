<div class="col-12">

    <x-page-title :page="$page" />


    <form wire:submit='update'>

        <div class="text-end my-3">
            <button type="submit" class="btn btn-success">
                <div wire:loading>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span class="visually-hidden" role="status">Loading...</span>
                </div>Simpan
            </button>
        </div>

        <x-card>
            <x-upload-image :data="$form->imgPush" key="foto" update="true" model="form.foto" />
        </x-card>

        <x-card>

            <p class="badge bg-primary"> Kode : {{ $form->kode }}</p>

            <div class="row row-cols-2 row-cols-lg-3">
                <x-input label="Nama WBTB" wire:model='form.nama_warisan' key="nama_warisan" />
                <x-input label="Kategori WBTB" wire:model='form.kategori_wbtb' key="kategori_wbtb" />
                <x-input label="Tingkatan Data" wire:model='form.tingkatan_data' key="tingkatan_data" />
                <x-input label="Tanggal Pendataan" type="date" wire:model='form.tgl_pendataan' key="tgl_pendataan" />
                <x-input label="Tanggal Verifikasi WBTB" type="date" wire:model='form.tgl_verifikasi'
                    key="tgl_verifikasi" />
                <x-input label="Tanggal Penetapan" type="date" wire:model='form.tgl_penetapan' key="tgl_penetapan" />

                <x-input label="Sebaran Kabupaten" wire:model='form.sebaran_kabupaten' key="sebaran_kabupaten" />
                <x-input label="Entitas Kebudayaan" wire:model='form.entitas_kebudayaan' key="entitas_kebudayaan" />
                <x-input label="Domain WBTB" wire:model='form.domain_wbtb' key="domain_wbtb" />
                <x-input label="Nama Objek" wire:model='form.nama_objek' key="nama_objek" />
                <x-input label="Wilayah atau level administrasi" wire:model='form.wilayah_level' key="wilayah_level" />
                <x-input label="Kondisi Sekarang" wire:model='form.kondisi_sekarang' key="kondisi_sekarang" />


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

                <x-input label="Latitude" wire:model='form.latitude' key="latitude" />
                <x-input label="Longitude" wire:model='form.longitude' key="longitude" />
                <x-input label="Tanggal Penerimaan" type="date" wire:model='form.tgl_penerimaan'
                    key="tgl_penerimaan" />
                <x-input label="Nama Petugas" wire:model='form.nama_petugas' key="nama_petugas" />
                <x-input label="Nama Lembaga" wire:model='form.nama_lembaga' key="nama_lembaga" />
                <x-input label="Nama SDM Kebudayaan" wire:model='form.nama_sdm' key="nama_sdm" />
                <x-input label="Youtube" wire:model='form.youtube' key="youtube" />
            </div>
        </x-card>


        <x-card>
            <label class="form-label">Deskripsi</label>
            <div wire:ignore>
                <textarea class="summernote" wire:model='form.deskripsi'>{{ $form->deskripsi ?? '' }}</textarea>
            </div>
            <x-default-error key="deskripsi" />

            <div class="mt-3">
                <x-textarea label="Tempat Penerimaan" wire:model='form.tempat_penerimaan' key="tempat_penerimaan" />
            </div>
        </x-card>
    </form>
</div>




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
