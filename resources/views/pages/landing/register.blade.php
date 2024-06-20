@extends('pages.landing._template')
@section('content')
    <!--Main layout-->
    <section class="gr-2">
        <div class="container ">
            <div class="row vh-100 justify-content-center align-items-center">
                <div class="col-xl-8 col-lg-9 align-self-center">

                    {{-- <x-alert-card /> --}}

                    <div class="card py-3">
                        <div class="card-body">
                            <form action="{{ route('auth.store') }}" method="POST">
                                @csrf
                                <div class="py-4 px-3 row row-cols-1 row-cols-lg-2 g-3">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nama" @class(['form-control', 'is-invalid' => $errors->has('nama')])
                                                placeholder='Nama...' value="{{ old('nama') }}" />
                                            <label for="">Nama</label>
                                            @error('nama')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" name="nik" @class(['form-control', 'is-invalid' => $errors->has('nik')])
                                                placeholder='Nik...' value="{{ old('nik') }}" />
                                            <label for="">NIK</label>
                                            @error('nik')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" @class(['form-control', 'is-invalid' => $errors->has('email')])
                                                placeholder='Email...' value="{{ old('email') }}" />
                                            <label for="">Email</label>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" name="no_hp" @class(['form-control', 'is-invalid' => $errors->has('no_hp')])
                                                placeholder='No Hp...' value="{{ old('no_hp') }}" />
                                            <label for="">No Hp</label>
                                            @error('no_hp')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <select @class(['form-select', 'is-invalid' => $errors->has('jenis_kelamin')]) name="jenis_kelamin">
                                                <option value="" selected>Jenis Kelamin</option>
                                                <option value="L" @selected(old('jenis_kelamin') == 'L')>Laki-laki</option>
                                                <option value="P" @selected(old('jenis_kelamin') == 'P')>Prempuan</option>
                                            </select>
                                            <label for="floatingSelect">Jenis Kelamin</label>

                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <select @class(['form-select', 'is-invalid' => $errors->has('agama')]) name="agama">
                                                <option value="" selected>Agama</option>
                                                @foreach ($agama as $agamas)
                                                    <option value="{{ $agamas }}" @selected(old('agama', '') == $agamas)>
                                                        {{ $agamas }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Agama</label>

                                            @error('agama')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <select @class([
                                                'form-control select2',
                                                'is-invalid' => $errors->has('bidang'),
                                            ]) data-placeholder="Pilih Bidang... "
                                                multiple name="bidang[]">
                                                @foreach ($bidang as $key => $val)
                                                    <optgroup label="{{ $key }}">
                                                        @foreach ($val as $k)
                                                            <option value="{{ $k }}"
                                                                @selected(in_array($k, old('bidang', [])))>
                                                                {{ $k }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            @error('bidang')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" @class(['form-control', 'is-invalid' => $errors->has('password')])
                                                placeholder='Password...' />
                                            <label for="">Password</label>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="password" name="confirm" @class(['form-control', 'is-invalid' => $errors->has('confirm')])
                                                placeholder='Konfirmasi Password...' />
                                            <label for="">konfirmasi Password</label>
                                            @error('confirm')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- Google Recaptcha Widget-->
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display(['data-size' => 'fill']) !!}

                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn-block btn btn-info mb-2">Daftar</button>
                                            <a href="{{ route('login') }}">Sudah Punya Akun? Login</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
