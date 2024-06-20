@props([
    'maxFile' => '2M',
    'key' => false,
    'allowed' => 'png jpg jpeg',
    'accept' => 'image/*',
    'title' => false,
    'data' => false,
])

<div class="col mb-3">
    <label for="">{{ $title }}</label>
    <div class="@error($key) border border-danger @enderror">
        @error($key)
            <p class="text-danger text-center">{{ $message }}</p>
        @enderror


        <div wire:ignore>
            <input type="file" class="dropify" data-max-file-size="{{ $maxFile }}" wire:model='{{ $key }}'
                data-allowed-file-extensions="{{ $allowed }}" accept="{{ $accept }}"
                data-default-file="{{ $data ?? '' }}" />
        </div>

    </div>
</div>
