<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Language" content="en" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>DAPOBUD</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

    @stack('style')

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script defer src="{{ asset('assets/template/dist/assets/scripts/main.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/demo.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/toastr.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/scrollbar.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/fullcalendar.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/maps.js') }}"></script>
    <script defer src="{{ asset('assets/template/dist/assets/scripts/chart_js.js') }}"></script>
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
        @include('pages.dashboard.admin._header')

        <div class="app-main">

            @include('pages.dashboard.admin._sidebar')

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>
                                    Analytics Dashboard
                                    <div class="page-title-subheading">
                                        This is an example dashboard created
                                        using build-in elements and
                                        components.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @yield('content')
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

    @stack('script')

    @if (session()->has('alert'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: '{{ session('alert.type') }}',
                title: '{{ session('alert.message') }}'
            });
        </script>
    @endif

</body>

</html>
