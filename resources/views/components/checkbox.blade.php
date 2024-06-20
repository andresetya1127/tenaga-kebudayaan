@props(['col' => false, 'id' => false, 'key' => false])

<div class="{{ $col ?? 'col' }}">
    <div class="form-check form-check-inline">
        <input {{ $attributes }} type="checkbox" id="{{ $id }}"
            class="form-check-input @error($key) is-invalid @enderror">
        <label class="form-label form-check-label" for="{{ $id }}">{{ $id }}</label>
    </div>
</div>
