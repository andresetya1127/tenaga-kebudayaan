<div class="col-12">
    <x-page-title :disload='true' :page="$page" />

    <div class="mb-3 d-flex align-items-center justify-content-between">
        <x-link :href="route('index.cagar_budaya')">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </x-link>

        <div class="">
            <input type="search" class="form-control" placeholder="Pencarian Draft..." wire:model.live='search'>
        </div>
    </div>

    <div class="row">
        @forelse ($data as $dt)
            <div class="col-lg-4 col-md-6">
                @php
                    if ($dt->status_draft == 1) {
                        $value = 25;
                    } elseif ($dt->status_draft == 2) {
                        $value = 50;
                    } elseif ($dt->status_draft == 3) {
                        $value = 75;
                    }
                @endphp
                <x-card-widget :data="$value" :head="$dt->nama_cagar">
                    <a href="{{ route('complete.cagar_budaya', $dt->id_cagar) }}" class="btn btn-secondary btn-sm">
                        Lengkapi Data
                        <i class="fa-regular fa-paper-plane"></i></a>
                </x-card-widget>
            </div>
        @empty
            <div class="col-12 text-center text-muted fs-2">
                <i class="fa-regular fa-compass"></i> Data Tidak Ditemukan.
            </div>
        @endforelse
    </div>

    <x-pagination class="justify-content-center" :items="$data" />
</div>
