@props(['active' => false, 'divider' => false, 'icon' => false, 'dropdown' => false])

@php
    $class = $active ?? false ? 'mm-active' : '';
@endphp

@if ($divider)
    <li class="app-sidebar__heading">{{ $divider }}</li>
@endif

@if ($dropdown)
    <li {{ $attributes->merge(['class' => $class]) }}>
        <a href="#" aria-expanded="{{ $active ? 'true' : 'false' }}">
            <i class="metismenu-icon {{ $icon ?? false ? $icon : '' }}"></i>
            {{ $dropdown }}
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul class="mm-collapse {{ $active ?? false ? 'mm-show' : '' }}">
            {{ $slot }}
        </ul>
    </li>
@else
    <li>
        <a {{ $attributes->merge(['class' => $class]) }}>
            <i class="metismenu-icon {{ $icon ?? false ? $icon : '' }}"></i>
            {{ $slot }}
        </a>
    </li>
@endif
