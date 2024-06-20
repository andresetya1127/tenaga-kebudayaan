@props(['error' => false, 'label' => false, 'key' => false, 'disable' => false, 'col' => false])

@php
    $class = $errors->has($key) ?? false ? 'form-control is-invalid' : 'form-control';
@endphp

<div class="{{ $col ?? 'col' }} mb-3">
    @if ($label)
        <label for="" class="form-label">{{ $label }}</label>
    @endif
    <select {{ $attributes->merge(['class' => $class, 'disabled' => $disable]) }}>
        {{ $slot }}
    </select>

    @error($key)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
