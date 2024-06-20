<div class="col-12">
    <x-page-title :page="$page" />

    <div class="row row-cols-lg-2 row-cols-1">
        <div class="col">
            <x-card>
                <div class="" wire:ignore>
                    <input type="file" class="dropify" data-default-file="{{ $foto ?? '' }}" wire:model='foto'
                        data-allowed-file-extensions="jpg png jpeg" data-max-file-size="2M"
                        data-max-file-size-preview="2M" accept=".jpg,.jpeg,.png" />
                </div>
            </x-card>
        </div>

        <div class="col">
            <x-card>
                <form wire:submit='updateProfile'>
                    <div class="">
                        <label for="" class="form-label">Nama</label>
                        <x-input place="Masukkan Nama." wire:model='name' key="name" />
                    </div>
                    <div class="">
                        <label for="" class="form-label">NIK</label>
                        <x-input type="number" place="Masukkan Judul Berita." wire:model='nik' key="nik" />
                    </div>
                    <div class="">
                        <label for="" class="form-label">No Hp</label>
                        <x-input type="number" place="Masukkan No Hp." wire:model='no_hp' key="no_hp" />
                    </div>
                    <div class="">
                        <label for="" class="form-label">Email</label>
                        <x-input type="email" place="Masukkan Email." wire:model='email' key="email" />
                    </div>

                    <div class="">
                        <x-select wire:model='jenis_kelamin' label="Jenis Kelamin" key="jenis_kelamin">
                            <option value="" selected>--Pilih Jenis Kelamin--</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Prempuan</option>
                        </x-select>
                    </div>

                    <div class="">
                        <label for="" class="form-label">Password Baru</label>
                        <x-input type="password" place="Masukkan Password Baru." wire:model='password' key="password" />
                    </div>

                    <div class="">
                        <label for="" class="form-label">Konfirmasi Password</label>
                        <x-input type="password" place="Masukkan Konfirmasi Password." wire:model='confirmPassword'
                            key="confirmPassword" />
                    </div>

                    <div class="text-end mt-3">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</div>

@push('style')
    <script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">
@endpush

@push('script')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
