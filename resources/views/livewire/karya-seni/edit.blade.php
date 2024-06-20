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
                <!--Nama Karua-->
                <x-input type="text" key="judul" wire:model='form.judul' label="Judul karya Seni" />

                <!--Nama Pencipta-->
                <x-input type="text" key="nama_pencipta" wire:model='form.nama_pencipta' label="Nama Pencipta" />

                <!--Tahun Tercipta-->
                <x-input type="number" key="tahun_tercipta" wire:model='form.tahun_tercipta'
                    label="Masukkan Tahun Diciptakannya..." />

                <!--No Pelestari-->
                <x-input type="number" key="no_hp_pelestari" wire:model='form.no_hp_pelestari'
                    label="No.Kontak Pelestari" />

                <!--NIK-->
                <x-input type='number' key="nik" wire:model='form.nik' label="NIK" />

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

                <!--Alamat-->
                <x-input key="alamat" label="Alamat" place="Masukkan alamat..." wire:model='form.alamat' />

                <x-input tp='text' key="longitude" wire:model='form.longitude' label="Longitude" />

                <x-input tp='text' key="latitude" wire:model='form.latitude' label="Latitude" />

                <!--Jumlah Pendukung-->
                <x-input type='number' key="jumlah_pendukung" wire:model='form.jumlah_pendukung'
                    label="Jumlah Pendukung" />

                <!--Jumlah Dipentaskan-->
                <x-input type='text' key="pentas" wire:model='form.pentas' label="Dipentaskan/Ditampilkan" />
            </div>
        </x-card>


        <x-card>
            <h5 class="mb-3">Cabang Karya Seni</h5>
            <div class="row gy-4">
                @foreach ($data['cabang_seni'] as $dt)
                    <x-checkbox value="{{ $dt }}" :id="$dt" wire:model='form.cabang_seni'
                        col="col-lg-auto" key="cabang_seni" />
                @endforeach
            </div>
            <x-default-error key="cabang_seni"></x-default-error>
        </x-card>


        <!--Social Media-->
        <x-card>
            <div class="row row-cols-1 row-cols-lg-2 g-3">
                <!--Email-->
                <x-input type="text" label="Email" key="email" wire:model='form.email' />

                <!--Facebook-->
                <x-input type="text" label="Facebook" key="facebook" wire:model='form.facebook' />

                <!--Instagram-->
                <x-input type="text" label="Instagram" key="instagram" wire:model='form.instagram' />
            </div>
        </x-card>

        <x-card>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <!--Deskripsi Karya Budaya-->
                    <x-title icon='fa-bookmark'>Deskripsi Karya Budaya</x-title>
                    <div wire:ignore>
                        <textarea class="summernote" wire:model='form.deskripsi_karya'>{{ $form->deskripsi_karya ?? '' }}</textarea>
                    </div>
                    <x-default-error key='deskripsi_karya'></x-default-error>
                </div>
                <div class="col-lg-6">
                    <!--Kostum Dan Properti-->
                    <x-title icon='fa-bookmark'>Kostum Dan Properti</x-title>
                    <div wire:ignore>
                        <textarea class="summernote" wire:model='form.kostum_properti'>{{ $form->kostum_properti ?? '' }}</textarea>
                    </div>
                    <x-default-error key='kostum_properti'></x-default-error>
                </div>

                <div class="col-lg-6">
                    <!--Alat Yang Digunakan-->
                    <x-title icon='fa-bookmark'>Alat Yang Digunakan</x-title>
                    <div wire:ignore>
                        <textarea class="summernote" wire:model='form.alat'>{{ $form->alat ?? '' }}</textarea>
                    </div>
                    <x-default-error key='alat'></x-default-error>
                </div>

                <div class="col-lg-6">
                    <!--Sinopsis-->
                    <x-title icon='fa-bookmark'>Sinopsis</x-title>
                    <div wire:ignore>
                        <textarea class="summernote" wire:model='form.sinopsis'>{{ $form->sinopsis ?? '' }}</textarea>
                    </div>
                    <x-default-error key='sinopsis'></x-default-error>
                </div>

                <div class="col-12">
                    <!--Sinopsis-->
                    <x-title icon='fa-bookmark'>Penghargaan Yang Diproleh</x-title>
                    <div wire:ignore>
                        <textarea class="summernote" wire:model='form.penghargaan'>{{ $form->penghargaan ?? '' }}</textarea>
                    </div>
                    <x-default-error key='penghargaan'></x-default-error>
                </div>
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
