@props([
    'data' => false,
    'key' => false,
    'update' => false,
    'model' => false,
    'length' => 4,
])


<div class="row row-cols-lg-4 row-cols-2 gap-4 my-3">
    @foreach ($data as $key => $value)
        <div class="col position-relative" style="width: 250px; height: 150px">
            <button wire:click="deleteImg({{ $key }})" type="button"
                class="btn btn-danger rounded-circle position-absolute end-0">
                <i class="fa fa-trash p-0"></i>
            </button>
            <img src="{{ $update ? asset('storage/photos/' . $value) : $value->temporaryUrl() }}" alt=""
                class="img-thumbnail me-2" style="object-fit: contain; height: 100%; width: 100%">
        </div>
    @endforeach
    @if (count($data) < $length)
        <div class="col d-flex ms-3 align-items-center">
            <label class="btn" for="customFile1"><i class="fa fa-plus opacity-50"
                    style="font-size: 100px;"></i></label>
            <input type="file" class="form-control d-none" id="customFile1" accept=".jpg,.png,.jpeg"
                wire:model.change='{{ $model }}' />
            @error($key)
                <span class="text-danger opacity-75">{{ $message }}</span>
            @enderror
        </div>
    @endif
</div>
