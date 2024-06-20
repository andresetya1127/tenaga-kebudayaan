<div class="col-12 " x-data="{ open: false }">

    <div class="mb-3 text-end">
        <button class="btn btn-primary" @click="open = ! open">
            <i class="fa fa-plus"></i> Admin
        </button>
    </div>


    <div x-show="open">
        <x-card>
            <form wire:submit='store'>
                <div>
                    <div wire:ignore>
                        <input type="file" class="dropify" wire:model='foto' data-max-file-size="2M"
                            data-allowed-file-extensions="png jpg jpeg gif">
                    </div>
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row row-cols-lg-2 row-cols-1 mt-3">
                    <x-input wire:model='nama' key="nama" label="Nama" />
                    <x-input type="number" wire:model='nik' key="nik" label="NIIK" />
                    <x-select wire:model='jenis_kelamin' key="jenis_kelamin" label="Jenis Kelamin">
                        <option value="" selected>Pilih Jenis Kelamin...</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Prempuan</option>
                    </x-select>
                    <x-input wire:model='email' type="email" key="email" label="Email" />
                    <x-input wire:model='no_hp' type="number" key="no_hp" label="No. Hp" />
                </div>

                <div class="text-end">
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </form>
        </x-card>
    </div>


    <x-card>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $users)
                        <tr>
                            <td>{{ $loop->index + $user->firstItem() }}</td>
                            <td>{{ $users->nama }}</td>
                            <td>{{ $users->jenis_kelamin == 'L' ? 'Laki-laki' : 'Prempuan' }}</td>
                            <td>{{ $users->email }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-card>

</div>
