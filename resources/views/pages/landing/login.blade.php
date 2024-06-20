@extends('pages.landing._template')
@section('content')
    <!--Main layout-->
    <section class="gr-2">
        <div class="container ">
            <div class="row vh-100 justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-7 align-self-center">

                    <x-alert-card />

                    <div class="card py-3">
                        <div class="card-body">

                            <x-logo-auth />

                            <form action="{{ route('auth') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="py-4 px-3 d-flex flex-column gap-3">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="email" name="email" class="form-control" />
                                        <label class="form-label">Email</label>
                                    </div>

                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="password" name="password" class="form-control " />
                                        <label class="form-label">Password</label>
                                    </div>
                                    <!-- Google Recaptcha Widget-->
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn-block btn btn-info mb-2">Login</button>
                                        <a href="{{ route('register') }}">Tidak Punya Akun? Daftar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('regis'))
        <!--Main layout-->
        <div class="position-fixed w-100 bg-white top-0 h-100 gap-3 row ">
            <div class="col-lg-3 m-auto">
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle me-3"></i>
                    {{ session('regis')['title'] }}
                </div>
                <div class="border border-secondary rounded p-3">
                    <b>Note :</b> {{ session('regis')['message'] }}
                </div>
            </div>
        </div>
    @endif
@endsection
