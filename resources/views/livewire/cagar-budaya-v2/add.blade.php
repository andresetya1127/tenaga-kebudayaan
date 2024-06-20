    <div>
        <x-page-title :page="$page" />

        <form wire:submit='registerCagar'>
            <div class="col-12">
                <div class="row row-cols-1">
                    <div class="col">
                        <x-card>
                            <x-upload-image :data="$form->imgPush" key="foto" model="form.foto" />
                        </x-card>
                    </div>

                    <div class="col">
                        <x-card>
                            <div class="row row-cols-lg-2">
                                <x-select :error="$errors->has('jenis_cb')" label='Jenis Cagar' key=jenis_cb wire:model='form.jenis_cb'>
                                    <option value="" selected>--Pilih Jenis Cagar--</option>
                                    <option value="Benda" selected>Benda</option>
                                    <option value="Tak Benda" selected>Tak Benda</option>
                                </x-select>

                                <x-input :error="$errors->has('nama_cagar')" key='nama_cagar' label="Nama Cagar"
                                    wire:model='form.nama_cagar' />

                                <x-input :error="$errors->has('sifat_bangunan')" key='sifat_bangunan' label="Sifat Bangunan"
                                    wire:model='form.sifat_bangunan' />

                                <x-input :error="$errors->has('priode_bangunan')" key='priode_bangunan' label="Priode Bangunan"
                                    wire:model='form.priode_bangunan' />

                                <x-input :error="$errors->has('gaya_arsitektur')" key='gaya_arsitektur' label="Gaya Arsitektur Bangunan"
                                    wire:model='form.gaya_arsitektur' />

                                <x-input :error="$errors->has('fungsi_bangunan')" key='fungsi_bangunan' label="Fungsi Bangunan"
                                    wire:model='form.fungsi_bangunan' />

                                <x-input :error="$errors->has('bentuk_atap')" key='bentuk_atap' label="Bentuk Atap Bangunan"
                                    wire:model='form.bentuk_atap' />
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
