@props(['title' => false, 'text' => false])

<div class="row row-cols-2 border-bottom py-2 ">
    <div class="col fw-bold text-capitalize">{{ $title }}</div>
    <div class="col  text-capitalize"> {!! $text !!} {{ $slot }}</div>
</div>
