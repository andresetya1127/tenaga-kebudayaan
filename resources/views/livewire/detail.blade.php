<div class="col-12">

    <x-page-title :page="$page" />


    <div class="d-flex justify-content-end align-items-center mb-3 gap-2">

        <x-search-table place="Cari Cagar Budaya..." />
    </div>

    <x-card>
        <form wire:submit="{{ $detailUpdate ? 'update' : 'add' }}">
            <div class="row row-cols-lg-3 row-cols-1">
                <x-input key="renovasi" label="Renovasi" wire:model="renovasi" />
                <x-input key="lembaga_renovasi" label="Lembaga Renovasi" wire:model="lembaga_renovasi" />
                <x-input key="tgl_renovasi" label="Tanggal Renovasi" type="date" wire:model="tgl_renovasi" />
            </div>

            <div class="row row-cols-lg-2">
                <x-dropify title="Foto Sebelum" key="foto_sebelum" :data="$foto_sebelum" />
                <x-dropify title="Foto Sesudah" key="foto_sesudah" :data="$foto_sesudah" />
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-outline-primary" wire:click='resetForm'>
                    <i class="fa-solid fa-arrows-rotate"></i>
                </button>
            </div>
        </form>
    </x-card>


    <x-card>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Renovasi</th>
                    <th>Lembaga Renovasi</th>
                    <th>Tanggal Renovasi</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @forelse ($data as $key)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm" data-fslightbox="{{ $key->foto_sebelum }}"
                                    href="{{ Storage::url('photos/' . $key->foto_sebelum) }}">
                                    Sebelum
                                </a>
                                <a class="btn btn-secondary btn-sm" data-fslightbox="{{ $key->foto_sesudah }}"
                                    href="{{ Storage::url('photos/' . $key->foto_sesudah) }}">
                                    Sesudah
                                </a>
                            </td>
                            <td>{{ $key->renovasi }}</td>
                            <td>{{ $key->lembaga_renovasi }}</td>
                            <td>{{ $key->tgl_renovasi }}</td>
                            <td>
                                <button class="btn btn-outline-info" wire:click='edit("{{ $key->id }}")'>
                                    <i class="fa-solid fa-poo-storm"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="20">Tidak Ada Data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-pagination :items="$data" />
    </x-card>
</div>

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endpush

@push('script')
    <!-- Add the library (only one file) -->
    <script src="{{ asset('assets/js/fslightbox.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/init/dropify.init.js') }}"></script>
@endpush
