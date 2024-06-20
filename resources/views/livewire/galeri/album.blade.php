<div class="col-12" style="position: relative;">


    <x-page-title :page="$page" />



    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('list.galeri') }}" class="btn btn-primary mb-3">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <div class="">
            <button class="btn btn-outline-danger" onclick="confirmAction()"><i class="fa fa-trash"></i></button>
            {{-- <button class="btn btn-outline-primary" wire:click='$toggle("modalEdit")'>
                <i class="fa fa-edit"></i> Ubah</button> --}}
        </div>
    </div>

    <div class="row">
        <div class="col-12 my-4">
            <div class="d-flex gap-3">
                <span><i class="fa-solid fa-table-list"></i> {{ $galeri->kategori }}</span>
                <span><i class="fa-solid fa-cloud"></i> {{ $galeri->nama_foto }}</span>
            </div>
        </div>

        @forelse (explode('||', $galeri->foto) as $img)
            <div class="col-lg-3">
                <div class="card">
                    <a data-fslightbox="gallery" href="{{ Storage::url('photos/' . $img) }}">
                        <img src="{{ Storage::url('photos/' . $img) }}" class="card-img-top img-x-show"
                            style="height: 350px; object-fit: cover;">
                    </a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">Belum ada gambar.</div>
        @endforelse
    </div>
</div>


@push('script')
    <!-- Add the library (only one file) -->
    <script src="{{ asset('assets/js/fslightbox.js') }}"></script>

    <script>
        function confirmAction() {
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
                    @this.confirmDelete()
                }
            })
        }
    </script>
@endpush
