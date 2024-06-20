<a {{ $attributes }} href="{{ $link ?? '#' }}" class="btn {{ $cls ?? 'btn-primary' }}">
    {{ $slot }}
</a>
