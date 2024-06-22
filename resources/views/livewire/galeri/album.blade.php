<div class="col-12" style="position: relative;">


    <x-page-title :page="$page" />

    @if ($modalEdit)
        <div class="row animate__animated animate__backInRight">
            <div class="col-lg-6">
                <x-card>
                    @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @forelse ($imgUpload as $key => $img)
                        <div class="border gap-2 shadow p-2 bg-body-tertiary rounded row align-items-center mb-2">
                            <div class="col-auto">
                                <img src="{{ $img->temporaryUrl() }}" alt="" width="50px" height="50px"
                                    class="rounded">
                            </div>
                            <div class="col-auto">
                                <span>Gambar.png</span>
                            </div>
                            <div class="col-auto ms-auto">
                                <button class="btn btn-outline-danger" wire:click="deleteImg({{ $key }})">
                                    <i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info">Silahkan unggah gambar.</div>
                    @endforelse

                    <div class="mt-4 d-flex justify-content-between align-items-center">
                        <span><b>Diunggah : {{ count($imgUpload) }}/5</b></span>
                        <div class="d-flex">
                            <label for="upload" class="btn btn-info me-3">
                                <i class="fa fa-upload"></i>
                                <input type="file" id="upload" class="d-none" wire:model.change='gambar'>
                            </label>
                            <form wire:submit='addGaleri'>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    @endif

    @if (!$modalEdit)
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('list.galeri') }}" class="btn btn-primary mb-3">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>

            <button class="btn btn-outline-primary" wire:click='$toggle("modalEdit")'>
                <i class="fa-solid fa-camera"></i>
            </button>
        </div>

        <div class="row">
            <div class="col-12 my-4">
                <div class="d-flex gap-3">
                    <span><i class="fa-solid fa-table-list"></i> {{ $galeri->kategori }}</span>
                    <span><i class="fa-solid fa-cloud"></i> {{ $galeri->nama_foto }}</span>
                </div>
            </div>

            @foreach (explode('||', $galeri->foto) as $index => $img)
                @empty(!$galeri->foto)
                    <div class="col-lg-3">
                        <div class="card">
                            <img src="{{ Storage::url('photos/' . $img) }}" class="card-img-top img-x-show"
                                style="height: 350px; object-fit: cover;">
                            <div class="card-img-overlay text-end">
                                <a data-fslightbox="gallery" href="{{ Storage::url('photos/' . $img) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <button onclick="return confirmAction({{ $index }})" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                @endempty
                @empty($galeri->foto)
                    <div class="col-12 text-center">
                        <p>Belum Ada Gambar.</p>
                    </div>
                @endempty
            @endforeach
        </div>
    @endif
</div>


@push('script')
    <!-- Add the library (only one file) -->
    <script src="{{ asset('assets/js/fslightbox.js') }}"></script>

    <script>
        function confirmAction(index) {
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
                    @this.confirmDelete(index)
                }
            })
        }
    </script>
@endpush
