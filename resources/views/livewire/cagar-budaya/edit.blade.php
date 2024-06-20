<div class="">
    <form wire:submit='update' class="gap-20">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h5>{{ $page }}</h5>
            <button type="submit" class="btn btn-success text-white">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>


        <div class="col-12">
            <x-card>
                <h6 class="c-grey-900">Profil</h6>
                <div class="row row-cols-xxl-3  g-3 mt-3">
                    <!--Nama-->
                    <div class="col">
                        <x-input tp="text" label="Nama Lengkap" key="nama" wire:model='form.nama'
                            place="Masukkan nama..."></x-input>
                    </div>

                    <!--Tmpt Lahir-->
                    <div class="col">
                        <x-input tp="text" label="Tempat Lahir" key="tmpt_lahir" wire:model='form.tmpt_lahir'
                            place="Masukkan Tempat Lahir..."></x-input>
                    </div>

                    <!--TGL Lahir-->
                    <div class="col">
                        <x-input tp="date" label="Tanggal Lahir" key="tgl_lahir"
                            wire:model='form.tgl_lahir'></x-input>
                    </div>

                    <!--JK-->
                    <div class="col">
                        <x-select label="Jenis Kelamin" wire:model='form.jk' key="jk">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Prempuan</option>
                        </x-select>
                    </div>

                    <!--Agama-->
                    <div class="col">
                        <x-select label="Agama" wire:model='form.agama' key="agama">
                            <option selected>Pilih Agama</option>
                            @foreach ($cagar->getEnum('agama') as $agm)
                                <option value="{{ $agm }}">{{ $agm }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <!--Pendidikan-->
                    <div class="col">
                        <x-select label="Pendidikan Terakhir" wire:model='form.pendidikan' key="pendidikan">
                            <option selected>Pilih Pendidikan</option>
                            @foreach ($cagar->getEnum('pendidikan') as $pnd)
                                <option value="{{ $pnd }}">{{ $pnd }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <!--Pekerjaan-->
                    <div class="col">
                        <x-select label="Pekerjaan" wire:model='form.pekerjaan' key="pekerjaan">
                            <option selected>Pilih Pekerjaan</option>
                            @foreach ($cagar->getEnum('pekerjaan') as $pkr)
                                <option value="{{ $pkr }}">{{ $pkr }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <!--No.Hp-->
                    <div class="col">
                        <x-input tp="number" label="No.Hp/ Wa" key="no_hp" wire:model='form.no_hp'
                            place="Masukkan No.Hp..."></x-input>
                    </div>
                </div>
            </x-card>
        </div>

        <!--Social Media-->

        <div class="col-12">
            <x-card>
                <h6 class="c-grey-900">Sosial Media</h6>
                <div class="row row-cols-lg-2 g-3 mt-3">

                    <!--Email-->
                    <div class="col">
                        <x-input-group tp="text" label="Email" key="email" wire:model='form.email'
                            place="Masukkan Email Valid...">
                            <i class="ti ti-google input-group-text c-red-500"></i>
                        </x-input-group>
                    </div>

                    <!--Facebook-->
                    <div class="col">
                        <x-input-group tp="text" label="Facebook" key="facebook" wire:model='form.facebook'
                            place="Masukkan Nama Facebook..">
                            <i class="fa-brand fa-facebook input-group-text c-blue-500"></i>
                        </x-input-group>
                    </div>

                    <!--Instagram-->
                    <div class="col">
                        <x-input-group tp="text" label="Instagram" key="instagram" wire:model='form.instagram'
                            place="Masukkan Nama Instagram..">
                            <i class="ti ti-instagram input-group-text c-red-500"></i>
                        </x-input-group>
                    </div>

                    <!--Youtube-->
                    <div class="col">
                        <x-input-group tp="text" label="Youtube" key="youtube" wire:model='form.youtube'
                            place="Masukkan Link Youtube..">
                            <i class="ti ti-youtube input-group-text bgc-grey-500 c-red-500"></i>
                        </x-input-group>
                    </div>
                </div>
            </x-card>
        </div>

        <!--Bidang-->

        <div class="col-12">
            <x-card>
                <h6 class="c-grey-900">Lainnya</h6>
                <div class="row row-cols-lg-1 g-3 mt-3">
                    <!--Bidang-->
                    <div class="col">
                        <!--Bidang-->
                        <label for="" class="form-label">Bidang Tenaga Kebudayaan</label>
                        <x-input-error key='bidang'></x-input-error>

                        <div wire:ignore>
                            <textarea class="summernote" wire:model='form.bidang'>{{ $form->bidang }}</textarea>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('.summernote').summernote({
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
</div>
