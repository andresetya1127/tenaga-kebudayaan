@if (!empty($key))
    @error($key)
        <span class="error text-danger opacity-75">{{ $message }}</span>
    @enderror
@endif
