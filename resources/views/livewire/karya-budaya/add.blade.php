<div class="col-12">
    <x-page-title :page="$page" />

    <form wire:submit='add'>
        <div class="text-end mt-3 mb-2">
            <button type="submit" class="btn btn-success text-white">
                <div wire:loading>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span class="visually-hidden" role="status">Loading...</span>
                </div> Simpan
            </button>
        </div>

        <x-card>
            <x-upload-image :data="$form->imgPush" key="foto" model="form.foto" />
        </x-card>

        <x-card>
            <div class="row mt-1 row-cols-lg-2 row-cols-1">
                <!--Nama Karya-->
                <x-input tp="text" key="nama_karya" wire:model='form.nama_karya' label="Nama Karya Budaya" />

                <!--Nama Pencipta-->
                <x-input key="nama_pencipta" wire:model='form.nama_pencipta' label="Nama Pencipta" />


                <!--Tahun Tercipta-->
                <x-input type="number" key="tahun_tercipta" wire:model='form.tahun_tercipta' label="Tahun Tercipta" />

                <!--No Pelestari-->
                <x-input type="number" key="no_hp_pelestari" wire:model='form.no_hp_pelestari'
                    label="No. Hp/wa Pelestari" />

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

                <x-input tp='text' key="pentas" wire:model='form.pentas' label="Dipentaskan/Ditampilkan" />

                <x-input type='number' key="jumlah_pendukung" wire:model='form.jumlah_pendukung'
                    label="Jumlah Pendukung" />
            </div>
        </x-card>

        <x-card>
            <h5 class="mb-3">Jenis karya Budaya</h5>

            <div class="row gy-4">
                @foreach ($data['jenis_karya'] as $dt)
                    <x-checkbox value="{{ $dt }}" :id="$dt" wire:model='form.jenis_karya'
                        col="col-lg-auto" key="jenis_karya" />
                @endforeach
            </div>
            <x-default-error key="jenis_karya"></x-default-error>
        </x-card>

        <!--Social Media-->

        <x-card>
            <div class="row  g-3">
                <!--Email-->
                <x-input label="Email" key="email" wire:model='form.email' label="Email" col="col-lg-6" />

                <!--Facebook-->
                <x-input label="Facebook" key="facebook" wire:model='form.facebook' label="Facebook" col="col-lg-6" />

                <!--Instagram-->
                <x-input label="Instagram" key="instagram" wire:model='form.instagram' label="Instagram"
                    col="col-lg-6" />
            </div>
        </x-card>

        <x-card>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <!--Deskripsi Karya Budaya-->
                    <x-title icon='fa-bookmark'>Deskripsi Karya</x-title>
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
