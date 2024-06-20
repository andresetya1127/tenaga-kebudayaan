    <div>
        <x-page-title :page="$page" />

        <form wire:submit='registerCagar'>
            <div class="col-12">
                <div class="row  row-cols-1">
                    <div class="col">
                        <x-card>
                            <div class="row row-cols-lg-2">
                                <x-input :error="$errors->has('nomor_cb')" key='nomor_cb' label="ID Objek" wire:model='form.nomor_cb' />

                                <x-select label='Peringkat' key='peringkat' wire:model='form.peringkat'>
                                    <option value="" selected>--Pilih Peringkat--</option>
                                    <option value="1">Tidak Ada</option>
                                    <option value="2">Kabupaten</option>
                                    <option value="3">Provinsi</option>
                                    <option value="4">Nasional</option>
                                </x-select>

                                <x-input :error="$errors->has('nama_cagar')" key='nama_cagar' label="Nama Objek"
                                    wire:model='form.nama_cagar' />

                                <x-input :error="$errors->has('pendaftar')" key='pendaftar' label="Nama Pendaftar"
                                    wire:model='form.pendaftar' />

                                <x-input :error="$errors->has('tgl_pendaftaran')" type="date" key='tgl_pendaftaran'
                                    label="Tanggal Pendaftaran" wire:model='form.tgl_pendaftaran' />

                                <x-select :error="$errors->has('jenis_cb')" label='Jenis Cagar' key=jenis_cb wire:model='form.jenis_cb'>
                                    <option value="" selected>--Pilih Jenis Cagar--</option>
                                    <option value="Bangunan" selected>Bangunan</option>
                                    <option value="Benda" selected>Benda</option>
                                    <option value="Situs" selected>Situs</option>
                                    <option value="Struktur" selected>Struktur</option>
                                </x-select>


                                <x-select label='Kabupaten' key='kabupaten' wire:model.change='form.kabupaten'>
                                    <option value="" selected>--Pilih Kabupaten--</option>
                                    @foreach ($kab as $kabs)
                                        <option value="{{ $kabs->id }}">{{ $kabs->name }}</option>
                                    @endforeach
                                </x-select>

                                <x-select label='Kecamatan' key='kecamatan' wire:model.change='form.kecamatan'>
                                    <option value="" selected>--Pilih Kecamatan--</option>
                                    @foreach ($kec as $kecs)
                                        <option value="{{ $kecs->id }}">{{ $kecs->name }}</option>
                                    @endforeach
                                </x-select>


                                <x-select label='Desa/Kelurahan' key='desa_kel' wire:model.change='form.desa_kel'>
                                    <option value="" selected>--Pilih Desa--</option>
                                    @foreach ($desa as $ds)
                                        <option value="{{ $ds->id }}">{{ $ds->name }}</option>
                                    @endforeach
                                </x-select>



                                <x-input :error="$errors->has('alamat')" key='alamat' label="Jalan" wire:model='form.alamat' />
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit" wire:loading.attr='disabled'>
                                    <div wire:loading>
                                        <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                                        <span class="visually-hidden" role="status">Loading...</span>
                                    </div>
                                    Simpan
                                </button>
                            </div>
                        </x-card>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('style')
        <x-css asset='summernote'></x-css>
    @endpush

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <x-script asset='summernote'></x-script>

        <script>
            $('.summernote').summernote({
                placeholder: 'Ketikkan sesuatu disini.',
                tabsize: 2,
                height: 180,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set($(this).attr('wire:model'), contents);
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
    @endpush
