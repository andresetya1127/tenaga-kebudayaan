@props([
    'data' => false,
    'head' => false,
])

@php
    $val = $data ?? 0;
@endphp

<div class="card-shadow-info mb-3 widget-chart widget-chart2 text-start card">
    <div class="widget-content">
        @if ($head)
            <span class="ext-muted opacity-6">{{ $head }}</span>
        @endif
        <div class="widget-content-outer">
            <div class="widget-content-wrapper">
                <div class="widget-content-left pe-2 fsize-1">
                    <div class="widget-numbers mt-0 fsize-3 text-info">{{ $val }}%</div>
                </div>
                <div class="widget-content-right w-100">
                    <div class="progress-bar-xs progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ $val }}"
                            aria-valuemin="0" aria-valuemax="100" style="width: {{ $val }}%;"></div>
                    </div>
                </div>
            </div>
            <div class="widget-content-right fsize-1">
                <div>{{ $slot }}</div>
            </div>
        </div>
    </div>
</div>
