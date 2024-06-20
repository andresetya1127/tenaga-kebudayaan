<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Language" content="en" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/app-min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.ico') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script defer src="{{ asset('assets/template/dist/assets/scripts/main.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/demo.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/toastr.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/scrollbar.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/fullcalendar.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/maps.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/chart_js.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">

    @stack('style')

    <title>{{ $info->nama_web ?? '' }} | Lombok Tengah</title>

</head>

<body>

    <div id="loader">
        <div class="spinner"></div>
    </div>

    <script>
        window.addEventListener('load', function load() {
            const loader = document.getElementById('loader');
            setTimeout(function() {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        @include('layout._header')



        <div class="app-main">

            @include('layout._sidebar')

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="row">
                        {{ $slot }}
                    </div>
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                {{-- Isi --}}
                            </div>
                            <div class="app-footer-right">
                                {{-- Isi --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- select -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="{{ asset('assets/js/init/select.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/init/alert.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>

    <script src="{{ asset('assets/js/init/dropify.init.js') }}"></script>

    @stack('script')
</body>

</html>
