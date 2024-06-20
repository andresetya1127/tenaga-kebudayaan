<form wire:submit='addNews'>
    <div class="row ">
        <div class="col-12 mb-5">
            <a href="{{ route('list.berita') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="col-lg-6">
            <x-card>
                @if ($gambar)
                    <div class="row row-cols-1">
                        <div class="col m-auto position-relative" style="width: auto">
                            <button wire:click="deleteImg()" type="button"
                                class="btn btn-danger rounded-circle position-absolute end-0">
                                <i class="fa fa-trash p-0"></i>
                            </button>
                            <img src="{{ $gambar->temporaryUrl() }}" alt="" class="img-thumbnail"
                                style="max-height: 350px">
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <p class="text-muted">Tidak Ada Gambar Yang Dipilih</p>
                    </div>

                    <div class="mt-3 text-center">

                        <div class="btn btn-outline-primary btn-sm">
                            <label class="form-label m-0" for="customFile1">
                                <i class="fa fa-plus"></i> Gambar
                            </label>
                            <input type="file" class="form-control d-none" id="customFile1" accept=".jpg,.png,.jpeg"
                                wire:model.blur='gambar' />
                        </div>
                    </div>
                @endif
                @error('gambar')
                    <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </x-card>

        </div>

        <div class="col-lg-6">
            <x-card>
                <div class="">
                    <label for="" class="form-label">Judul</label>
                    <x-input place="Masukkan Judul Berita." wire:model='judul' key="judul" />
                </div>

                <div class="">
                    <label for="" class="form-label">Isi Berita</label>
                    <div wire:ignore>
                        <textarea class="summernote" wire:model='berita'></textarea>
                    </div>
                    <x-default-error key='berita'></x-default-error>
                </div>

                <div class="text-end mt-3">
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </x-card>
        </div>
    </div>
</form>

@push('style')
    <x-css asset='summernote'></x-css>
@endpush

@push('script')
    <x-script asset='summernote'></x-script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('.summernote').summernote({
            placeholder: 'Ketikkan sesuatu disini.',
            tabsize: 2,
            height: 180,
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set($(this).attr('wire:model'), contents);
                }
            },
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
@endpush
