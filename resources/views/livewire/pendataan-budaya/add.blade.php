<div class="">
    <x-page-title :page="$page" />

    <form wire:submit='addPendataan' class="gap-20">
        <div class="text-end mt-3 mb-2">
            <button type="submit" class="btn btn-success text-white">
                <div wire:loading>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span class="visually-hidden" role="status">Loading...</span>
                </div> Simpan
            </button>
        </div>

        <x-card>
            <div class="d-flex align-items-center justify-content-center">
                @if ($form->foto)
                    <div class="position-relative" style="width: 450; height: 250px">
                        <button wire:click="deleteImg()" type="button"
                            class="btn btn-danger rounded-circle position-absolute end-0">
                            <i class="fa fa-trash p-0"></i>
                        </button>
                        <img src="{{ $form->foto->temporaryUrl() }}" alt="" class="img-thumbnail me-2"
                            style="object-fit: contain; height: 100%; width: 100%">
                    </div>
                @else
                    <label class="btn" for="customFile1">
                        <i class="fa fa-plus opacity-50" style="font-size: 100px;"></i>

                    </label>

                    <input type="file" class="form-control d-none" id="customFile1" accept=".jpg,.png,.jpeg"
                        wire:model.change='form.foto' />
                @endif

            </div>
            @error('foto')
                <div class="text-center">
                    <p class="text-danger opacity-75">{{ $message }}</p>

                </div>
            @enderror
        </x-card>


        <x-card>
            <h6 class="c-blue-600">Profil</h6>
            <div class="row row-cols-lg-3 g-3 mt-3">
                <!--Nama-->
                <x-input label="Nama Lengkap" key="nama" wire:model='form.nama' place="Masukkan nama..." />

                <!--NIK-->
                <x-input type="number" label="NIK" key="nik" wire:model='form.nik' place="Masukkan NIK..." />

                <!--Tmpt Lahir-->
                <x-input label="Tempat Lahir" key="tmpt_lahir" wire:model='form.tmpt_lahir'
                    place="Masukkan Tempat Lahir..." />

                <!--TGL Lahir-->
                <x-input type="date" label="Tanggal Lahir" key="tgl_lahir" wire:model='form.tgl_lahir' />

                <!--JK-->
                <x-select label="Jenis Kelamin" wire:model='form.jk' key="jk">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Prempuan</option>
                </x-select>

                <!--Agama-->
                <x-select label="Agama" wire:model='form.agama' key="agama">
                    <option selected>Pilih Agama</option>
                    @foreach ($data->getEnum('agama') as $agm)
                        <option value="{{ $agm }}">{{ $agm }}</option>
                    @endforeach
                </x-select>

                <!--Pendidikan-->
                <x-select label="Pendidikan Terakhir" wire:model='form.pendidikan' key="pendidikan">
                    <option selected>Pilih Pendidikan</option>
                    @foreach ($data->getEnum('pendidikan') as $pnd)
                        <option value="{{ $pnd }}">{{ $pnd }}</option>
                    @endforeach
                </x-select>

                <!--Pekerjaan-->
                <x-select label="Pekerjaan" wire:model='form.pekerjaan' key="pekerjaan">
                    <option selected>Pilih Pekerjaan</option>
                    @foreach ($data->getEnum('pekerjaan') as $pkr)
                        <option value="{{ $pkr }}">{{ $pkr }}</option>
                    @endforeach
                </x-select>

                <!--No.Hp-->
                <x-input type="number" label="No.Hp/ Wa" key="no_hp" wire:model='form.no_hp'
                    place="Masukkan No.Hp..." />

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

                <x-input key="longitude" wire:model='form.longitude' label="Longitude" />

                <x-input key="latitude" wire:model='form.latitude' label="Latitude" />

                <!--Alamat-->
                <x-input key="alamat" label="Alamat" place="Masukkan alamat..." wire:model='form.alamat' />

                <!--bidang-->
                <div class="col">
                    <div class="bidang d-none" data-error=""></div>
                    <label for="" class="form-label">Bidang</label>
                    <div wire:ignore>
                        <select id="bidang" class="select-tags form-control" multiple placeholder="Pilih Bidang..."
                            wire:model='form.bidang'>
                            @foreach ($bidang as $key => $val)
                                <optgroup label="{{ $key }}">
                                    @foreach ($val as $k)
                                        <option value="{{ $k }}">{{ $k }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    @error('bidang')
                        <span class="text-danger" style="font-size: 0.875em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </x-card>

        <!--Social Media-->

        <x-card>
            <h6 class="c-blue-600">Sosial Media</h6>
            <div class="row row-cols-lg-2 g-3 mt-3">
                <!--Email-->
                <x-input type="email" label="Email" key="email" wire:model='form.email'
                    place="Masukkan Email Valid..." />

                <!--Facebook-->
                <x-input label="Facebook" key="facebook" wire:model='form.facebook'
                    place="Masukkan Nama Facebook.." />

                <!--Instagram-->
                <x-input label="Instagram" key="instagram" wire:model='form.instagram'
                    place="Masukkan Nama Instagram.." />


                <x-input label="Youtube" key="youtube" wire:model='form.youtube' place="Masukkan Link Youtube.." />

            </div>
        </x-card>


        <x-card>
            <h6 class="c-blue-600">Lainnya</h6>
            <div class="row row-cols-lg-1 g-3 mt-3">
                <!--Judul Karya-->

                <label for="" class="form-label">Judul Karya Dan Tahun Penciptaan</label>

                <div wire:ignore>
                    <textarea class="summernote" wire:model='form.judul_karya_tahun'></textarea>
                </div>
                <x-input-error key='judul_karya_tahun' />


                <!--Judul Karya-->
                <label for="" class="form-label">Penghargaan Yang Diproleh</label>

                <div wire:ignore>
                    <textarea class="summernote" wire:model='form.penghargaan'></textarea>
                </div>
                <x-input-error key='penghargaan' />
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
