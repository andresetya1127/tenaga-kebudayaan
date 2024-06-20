@php
    $src = [
        'dataTable' => [
            'https://cdn.datatables.net/2.0.2/js/dataTables.js',
            'https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js',
            'https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.min.js',
            'https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.min.js',
            asset('assets/js/init/datatables.init.js'),
        ],
        'summernote' => [
            'https://code.jquery.com/jquery-3.7.1.min.js',
            'https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js',
            asset('assets/js/init/summernote.init.js'),
        ],
    ];
@endphp

@if (!empty($asset))
    @foreach ($src[$asset] as $ast)
        <script data-navigate-once {{ $attributes }} src="{{ $ast }}"></script>
    @endforeach
@endif
