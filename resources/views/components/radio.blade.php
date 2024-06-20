@props(['key' => false, 'label' => false])

<div class="form-check">
    <input {{ $attributes }} class="form-check-input @error($key) is-invalid @enderror" type="radio">
    <label class="form-label form-check-label"> {{ $label }}</label>
</div>
