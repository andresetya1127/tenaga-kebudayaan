@props(['error' => false, 'label' => false, 'key' => false, 'place' => false, 'disable' => false, 'col' => null])

@php
    $class = $errors->has($key) ?? false ? 'form-control is-invalid' : 'form-control';
@endphp

<div class="{{ $col ?? 'col' }} mb-3">
    @if ($label)
        <label for="" class="form-label">{{ $label }}</label>
    @endif

    <textarea {{ $attributes->merge(['class' => $class, 'disabled' => $disable]) }} cols="100" rows="5"
        placeholder="{{ $place }}"></textarea>

    @error($key)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
