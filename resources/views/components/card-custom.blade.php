@props(['title' => false, 'class' => false, 'icon' => false])

<div class="card shadow-lg h-100">
    <div class="card-body  card-relative">

        <div {{ $attributes->merge(['class' => $class ? $class : '']) }}>
            @if ($icon)
                <i class="{{ $icon }}"></i>
            @else
                <i class="fa fa-arrow-right me-3"></i> {{ $title }} <i class="fa fa-arrow-left ms-3"></i>
            @endif
        </div>

        <div class="card-content text-muted">
            {{ $slot }}
        </div>
    </div>
</div>
