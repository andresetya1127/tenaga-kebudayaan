<div class="col-12">
    <x-page-title :page="$page" />
    @if (!$slideForm)
        <div class=" animate__animated animate__backInRight">
            <div class="d-flex justify-content-between align-items-center mt-3 mb-2 gap-2">
                <div class="">
                    <button type="button" class="btn btn-success" wire:click="$set('slideForm',true)">
                        <i class="fa fa-plus"></i> Dasar Hukum
                    </button>
                </div>
                <x-search-table />
            </div>

            <div class="row mt-3">
                @forelse ($data as $dt)
                    <div class="col-lg-4 col-md-6 col-12">
                        <x-card>
                            <h5 class="mb-3 text-center">{{ $dt->nama_dasar_hukum }}</h5>

                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ $dt->link_file }}" target="__blank" class="btn btn-info btn-sm">
                                    <i class="fa fa-mail-forward"></i>
                                </a>

                                <button wire:click="updateHukum('{{ $dt->id_dasar_hukum }}')"
                                    class="btn btn-secondary btn-sm">
                                    <i class="fa fa-gears"></i>
                                </button>

                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="return confirmAction('{{ $dt->id_dasar_hukum }}')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>

                        </x-card>
                    </div>
                @empty
                    <h5 class="text-center">Data Tidak Tersedia</h5>
                @endforelse
            </div>
            <x-pagination :items="$data" />
        </div>
    @endif

    @if ($slideForm)
        <div class="animate__animated animate__backInRight">
            <form wire:submit='submitHukum'>
                <x-card>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary btn-sm" wire:click="$set('slideForm',false)">
                            <i class="fa-solid fa-angle-left"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-check"></i> Simpan
                        </button>
                    </div>
                    <div class="mt-3">
                        <div class="row row-cols-lg-2 row-cols-1">
                            <div class="col">
                                <x-input key="dasar_hukum" wire:model='dasar_hukum' label="Nama Dasar Hukum"
                                    place="Masukkan Nama Dasar Hukum." />
                            </div>
                            <div class="col">
                                <x-input key="link_file" wire:model='link_file' label="Link File"
                                    place="Masukkan Link File." />
                            </div>
                        </div>
                    </div>
                </x-card>
            </form>
        </div>
    @endif

</div>

@push('script')
    <script>
        function confirmAction(param) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus itu!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Panggil metode untuk melakukan tindakan yang sesuai jika pengguna mengonfirmasi
                    @this.confirmDelete(param)
                }
            })
        }
    </script>
@endpush
