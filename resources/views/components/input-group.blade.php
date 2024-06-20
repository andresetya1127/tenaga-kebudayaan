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

    <div class="input-group">
        <input {{ $attributes->merge(['class' => $class, 'type' => $tp, 'disabled' => $disable]) }}
            placeholder="{{ $place ?? false ? $place : ':Ketikkan Sesuatu...' }}" wire:loading.attr="disabled">
        {{ $slot }}
    </div>

    @error($key)
        <div class="invalid-feedback  opacity-75">
            {{ $message }}
        </div>
    @enderror
</div>
