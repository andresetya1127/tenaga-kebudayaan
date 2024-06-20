<div>
    <x-page-title :page="$page" />
    <div class="text-end my-3">
        <button class="btn btn-success" type="button" wire:click='saveInformasi'>Simpan</button>
    </div>
    <x-card>
        <div class="row">
            <div class="col-lg-6 col-12 " wire:ignore>
                <label for="">Logo Website</label>
                <input type="file" class="dropify" data-default-file="{{ $logo }}" wire:model='logo'
                    data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg gif">
            </div>

            <div class="col-lg-6 col-12 " wire:ignore>
                <label for="">Foto Landing</label>
                <input type="file" class="dropify" data-default-file="{{ $foto_landing }}" wire:model='foto_landing'
                    data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg gif">
            </div>

            <div class="col-12 row row-cols-lg-3 row-cols-1 mt-5">
                <x-input key="nama_web" label="Nama Website" wire:model='nama_web' />
                <x-input key="website" label="Link Website" wire:model='website' />
                <x-input key="lokasi_map" label="Longitude & Latitude" wire:model='lokasi_map' />
                <x-textarea key="alamat" label="Alamat" wire:model='alamat' />
                <x-textarea key="deskripsi" label="Deskripsi" wire:model='deskripsi' />
            </div>
        </div>
    </x-card>

    <x-card>
        <div class="row">
            <div class="col-lg-4 col-12 " wire:ignore>
                <label class="form-label">Foto Kepala Dinas</label>
                <input type="file" class="dropify" data-default-file="{{ $foto_kepala }}" wire:model='foto_kepala'
                    data-max-file-size="2M" data-height="290" data-allowed-file-extensions="png jpg jpeg gif">
            </div>

            <div class="col-lg-8 col-12">
                <x-input key="kepala_dinas" label="Nama Kepala Dinas" wire:model='kepala_dinas' />

                <x-textarea key="sekapur-sirih" placeholder="Sekapus Sirih" label="Sekapur Sirih"
                    wire:model='sekapur_sirih' rows="10" />
            </div>
        </div>
    </x-card>

    <x-card>
        <div class="d-flex justify-content-between">
            <h5>Sosial Media & Kontak</h5>
            <button class="btn {{ $status_sosmed ? 'btn-success' : 'btn-danger' }}" wire:click='setSosmed()'>
                <i class="fa fa-power-off fw-bold"></i>
            </button>
        </div>
        <div class="col-12 row row-cols-lg-2 row-cols-1 mt-4">
            <x-input key="no_kontak" label="Kontak Website" type="number" wire:model='no_kontak' />
            <x-input key="email" label="Email" wire:model='email' />
            <x-input key="facebook" label="Facebook" wire:model='facebook' />
            <x-input key="instagram" label="Instagram" wire:model='instagram' />
            <x-input key="tiktok" label="Tiktok" wire:model='tiktok' />
            <x-input key="youtube" label="Youtube" wire:model='youtube' />
            <x-input key="twiter" label="Twiter" wire:model='twiter' />
        </div>
    </x-card>

</div>
