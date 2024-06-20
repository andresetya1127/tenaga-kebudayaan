<div>
    <x-card>
        <form class="row align-items-center" action="{{ route('pdf', $filter) }}" method="POST">
            @csrf
            <x-select col="col-lg-4" label="Wilayah" name="wilayah" wire:model.live='wilayah'>
                <option selected>-- Pilih Wilayah --</option>
                <option value="all">Semua</option>
                @forelse ($kecamatan as $kec)
                    <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                @empty
                @endforelse
            </x-select>

            <x-input-group key="sorting" label="Pencarian" name="sort" col="col-lg-8" wire:model.change='sort'
                place="Masukkan Kata Kunci...">
                <button type="submit" class="btn btn-primary" {{ $found ? '' : 'disabled' }}>
                    Cetak
                    @if ($found)
                        <span class="badge text-bg-secondary">{{ $found . ' Data' }}</span>
                    @endif
                </button>
            </x-input-group>
        </form>

    </x-card>
</div>
