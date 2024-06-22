<div class="col-12">

    <x-page-title :page="$page" />

    @if ($modalAdd)
        <div class="mb-4">
            <button class="btn btn-secondary" wire:click='$toggle("modalAdd")'>
                <i class="fa-solid fa-arrow-left"></i>
            </button>
        </div>

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
                        <label for="upload" class="btn btn-info me-3">
                            <i class="fa fa-upload"></i>
                            <input type="file" id="upload" class="d-none" wire:model.change='gambar'>
                        </label>
                    </div>
                </x-card>
            </div>

            <div class="col-lg-6">
                <x-card>
                    <form wire:submit='addGaleri'>
                        <x-input wire:model='nama_foto' key="nama_foto" label=" Nama Foto" />
                        <x-input wire:model='kategori' key="kategori" label=" Kategori" />

                        <div class="text-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </x-card>
            </div>
        </div>
    @endif

    @if (!$modalAdd && !$filter)
        <div class="mb-4 d-flex align-items-center justify-content-end gap-3">
            <button class="btn btn-outline-info" wire:click='$toggle("modalAdd")'>
                <i class="fa-solid fa-camera"></i></button>

            <x-search-table />
        </div>

        <div class="row row-cols-2 row-cols-lg-3 g-4 animate__animated animate__backInRight">
            @forelse ($galeri as $img)
                <div class="col">
                    <a href="{{ route('album.galeri', $img->id) }}">
                        <div class="card text-bg-dark d-flex" style="height: 300px;">
                            <img src="{{ asset('storage/photos/' . explode('||', $img->foto)[0]) }}"
                                class="card-img img-responsive" alt="...">
                            <div class="card-img-overlay img-overlay-hover">
                                <h3 class="card-title fs-5 text-light text-center">{{ $img->nama_foto }}</h3>
                                <span class="text-center">{{ 'Kategori : ' . $img->kategori }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col m-auto text-center">Belum ada gambar.</div>
            @endforelse
        </div>
    @endif

    <x-pagination :items="$galeri" />
</div>
