<div class="col-12 " x-data="{ open: false }">

    @if ($edit)
        <button class="btn btn-primary mb-3" wire:click='$set("edit",false)'>
            <i class="fa fa-arrow-left"></i> Kembali
        </button>

        <x-card>
            <h4 class="mb-3">{{ $title }}</h4>
            <form wire:submit='update'>
                <div class="row row-cols-lg-2 row-cols-1 mt-3">
                    <x-input wire:model='foto' key="foto" label="foto" type="file" />
                    <x-input wire:model='nama' key="nama" label="Nama" />
                    <x-input type="number" wire:model='nik' key="nik" label="NIK" />
                    <x-select wire:model='jenis_kelamin' key="jenis_kelamin" label="Jenis Kelamin">
                        <option value="" selected>Pilih Jenis Kelamin...</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Prempuan</option>
                    </x-select>
                    <x-input wire:model='email' key="email" label="Email" />
                    <x-input wire:model='no_hp' type="number" key="no_hp" label="No. Hp" />
                    <x-input wire:model='password' type="password" key="password" label="password" />
                    <x-input wire:model='confirm' type="password" key="confirm" label="konfirmasi password" />
                </div>

                <div class="text-end">
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </form>
        </x-card>
    @endif



    @if (!$edit)
        <div class="mb-3 text-end">
            <button class="btn btn-primary" @click="open = ! open">
                <i class="fa fa-plus"></i> Admin
            </button>
        </div>


        <div x-show="open">
            <x-card>
                <form wire:submit='store'>
                    <div class="row row-cols-lg-2 row-cols-1 mt-3">
                        <x-input wire:model='foto' key="foto" label="foto" type="file" />
                        <x-input wire:model='nama' key="nama" label="Nama" />
                        <x-input type="number" wire:model='nik' key="nik" label="NIK" />
                        <x-select wire:model='jenis_kelamin' key="jenis_kelamin" label="Jenis Kelamin">
                            <option value="" selected>Pilih Jenis Kelamin...</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Prempuan</option>
                        </x-select>
                        <x-input wire:model='email' type="email" key="email" label="Email" />
                        <x-input wire:model='no_hp' type="number" key="no_hp" label="No. Hp" />
                        <x-input wire:model='password' type="password" key="password" label="password" />
                        <x-input wire:model='confirm' type="password" key="confirm" label="konfirmasi password" />
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $users)
                            <tr class="bg-danger">
                                <td>{{ $loop->index + $user->firstItem() }}</td>
                                <td>{{ $users->nama }}</td>
                                <td>{{ $users->jenis_kelamin == 'L' ? 'Laki-laki' : 'Prempuan' }}</td>
                                <td>{{ $users->email }}</td>
                                <td>
                                    <button type="button" @class([
                                        'btn',
                                        'btn-outline-info' => !empty($users->verify),
                                        'btn-danger' => empty($users->verify),
                                    ])
                                        wire:click='verifyOff({{ $users->id }})'>
                                        <i class="fa-solid fa-universal-access"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-primary"
                                        wire:click='$set("edit",{{ $users->id }})'>
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <x-pagination :items="$user" />
        </x-card>

    @endif
</div>
