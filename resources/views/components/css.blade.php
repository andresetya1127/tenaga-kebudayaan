@php
    $src = [
        'dataTable' => [
            'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css',
            'https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css',
            'https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.min.css',
        ],
        'summernote' => ['https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css'],
    ];
@endphp

@if (!empty($asset))
    @foreach ($src[$asset] as $ast)
        <link rel="stylesheet" href="{{ $ast }}">
    @endforeach
@endif
