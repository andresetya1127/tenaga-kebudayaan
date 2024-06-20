@props([
    'class' => false,
])

@php
    $cls = $class ?? false ? 'btn btn-sm ' . $class : 'btn btn-sm btn-info';
@endphp

<a {{ $attributes->merge(['class' => $cls]) }}>
    {{ $slot }}
</a>
