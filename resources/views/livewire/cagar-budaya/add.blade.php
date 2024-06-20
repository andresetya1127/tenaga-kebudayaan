<div>
    <form wire:submit='addCagar'>

        <div class="col-12 d-flex justify-content-between align-items-center mb-3">
            <h5>{{ $page }}</h5>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>

        <div class="col-12">
            <x-card>
                <div class="row">
                    <!--Nama-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="position-relative mb-3">
                            <x-input tp="text" label="Nama Lengkap" key="nama" wire:model='form.nama'
                                place="Masukkan nama..."></x-input>
                        </div>
                    </div>

                    <!--Tmpt Lahir-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="position-relative mb-3">
                            <x-input tp="text" label="Tempat Lahir" key="tmpt_lahir" wire:model='form.tmpt_lahir'
                                place="Masukkan Tempat Lahir..."></x-input>
                        </div>
                    </div>

                    <!--TGL Lahir-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="position-relative mb-3">
                            <x-input tp="date" label="Tanggal Lahir" key="tgl_lahir"
                                wire:model='form.tgl_lahir'></x-input>
                        </div>
                    </div>

                    <!--JK-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="position-relative mb-3">
                            <x-select label="Jenis Kelamin" wire:model='form.jk' key="jk">
                                <option selected>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Prempuan</option>
                            </x-select>
                        </div>
                    </div>

                    <!--Agama-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="position-relative mb-3">
                            <x-select label="Agama" wire:model='form.agama' key="agama">
                                <option selected>Pilih Agama</option>
                                @foreach ($data->getEnum('agama') as $agm)
                                    <option value="{{ $agm }}">{{ $agm }}</option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>

                    <!--Pendidikan-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="position-relative mb-3">
                            <x-select label="Pendidikan Terakhir" wire:model='form.pendidikan' key="pendidikan">
                                <option selected>Pilih Pendidikan</option>
                                @foreach ($data->getEnum('pendidikan') as $pnd)
                                    <option value="{{ $pnd }}">{{ $pnd }}</option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>

                    <!--Pekerjaan-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="position-relative mb-3">
                            <x-select label="Pekerjaan" wire:model='form.pekerjaan' key="pekerjaan">
                                <option selected>Pilih Pekerjaan</option>
                                @foreach ($data->getEnum('pekerjaan') as $pkr)
                                    <option value="{{ $pkr }}">{{ $pkr }}</option>
                                @endforeach
                            </x-select>
                        </div>
                    </div>

                    <!--No.Hp-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="position-relative mb-3">
                            <x-input tp="number" label="No.Hp/ Wa" key="no_hp" wire:model='form.no_hp'
                                place="Masukkan No.Hp..."></x-input>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>

        <div class="col-12">
            <x-card>
                <div class="row">
                    <!--Email-->
                    <div class="col-lg-6">
                        <x-input-group tp="text" key="email" wire:model='form.email'
                            place="Masukkan Email Valid...">
                            <span class="input-group-text">Email</span>
                        </x-input-group>
                    </div>

                    <!--Facebook-->
                    <div class="col-lg-6">
                        <x-input-group tp="text" key="facebook" wire:model='form.facebook'
                            place="Masukkan Nama Facebook..">
                            <span class="input-group-text">Facebook</span>
                        </x-input-group>
                    </div>

                    <!--Instagram-->
                    <div class="col-lg-6">
                        <x-input-group tp="text" key="instagram" wire:model='form.instagram'
                            place="Masukkan Nama Instagram..">
                            <span class="input-group-text">Instagram</span>
                        </x-input-group>
                    </div>

                    <!--Youtube-->
                    <div class="col-lg-6">
                        <x-input-group tp="text" key="youtube" wire:model='form.youtube'
                            place="Masukkan Link Youtube..">
                            <span class="input-group-text ">Youtube</span>
                        </x-input-group>
                    </div>
                </div>
            </x-card>
        </div>

        <!--Bidang-->

        <div class="col-12">
            <x-card>
                <!--Bidang-->
                <label for="" class="form-label">Bidang Tenaga Kebudayaan</label>

                <div wire:ignore>
                    <textarea class="summernote" wire:model='form.bidang'></textarea>
                </div>
                <x-default-error key='bidang'></x-default-error>
            </x-card>
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
