@props([
    'label' => false,
    'key' => false,
    'error' => false,
    'data' => false,
    'accept' => false,
    'disable' => false,
])

@php
    $class = $errors->has($key) ?? false ? 'form-control is-invalid' : 'form-control';
@endphp

<div class="position-relative mb-3">

    <label class="form-label">{{ $label }}</label>
    <input name="file" {{ $attributes->merge(['class' => $class, 'disabled' => $disable]) }} type="file"
        class="form-control" accept="{{ $accept }}">

    <span class="text-muted">Belum Ada Dokumen.</span>
    @error($key)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
