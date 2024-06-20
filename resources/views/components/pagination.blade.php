@props([
    'class' => false,
    'items' => false,
])
@php
    $cls = $class ? $class : 'justify-content-between';

@endphp
<div class="mt-4 d-flex align-items-center  {{ $cls }}">
    <span class="badge bg-primary"> Total Data: {{ $items->total() }}</span>
    {{ $items->links() }}
</div>
