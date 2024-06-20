@props([
    'class' => false,
    'class-card' => false,
])


@php
    $cls = $class ?? false ? 'card-body py-4 px-4' . $class : 'card-body py-4 px-4';
@endphp

<div class="main-card card mb-3 {{ $classCard ?? '' }}">
    <div {{ $attributes->merge(['class' => $cls]) }}>
        {{ $slot }}
    </div>
</div>
