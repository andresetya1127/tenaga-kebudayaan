@props([
    'error' => false,
    'label' => false,
    'key' => false,
    'type' => false,
    'disable' => false,
    'place' => false,
    'col' => null,
])

@php
    $class = $errors->has($key) ?? false ? 'form-control is-invalid' : 'form-control';
    $tp = $type ?? false ? $type : 'text';
@endphp

<div class="{{ $col ?? 'col' }} mb-3">
    @if ($label)
        <label class="form-label">{{ $label ?? '' }}</label>
    @endif

    <input {{ $attributes->merge(['class' => $class, 'type' => $tp, 'disabled' => $disable]) }}
        placeholder="{{ $place ?? false ? $place : ':Ketikkan Sesuatu...' }}" wire:loading.attr="disabled">

    @error($key)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
