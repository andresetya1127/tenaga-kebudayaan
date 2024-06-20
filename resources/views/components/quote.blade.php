@props(['title' => false])
<blockquote class="blockquote blockquote-custom bg-white p-5 shadow-lg rounded">
    <div class="blockquote-custom-left shadow-sm">
        <i class="fa fa-quote-left text-white"></i>
    </div>

    <h4 class="text-center">{{ $title }}</h4>
    <p class="mb-0 mt-2 font-italic text-muted">{{ $slot }}</p>

</blockquote>
