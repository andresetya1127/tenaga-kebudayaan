<?php

namespace App\Http\Controllers;

use App\Models\Tbl_karya_seni;
use App\Models\Tbl_tenaga_kebudayaan;
use App\Models\User;
use App\Rules\ReCaptcha;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    public function index()
    {
        return view('pages.landing.login');
    }

    public function register()
    {
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha'];

        $json = Storage::get('public/json/bidang.json');
        $bidang = json_decode($json, true);

        return view('pages.landing.register', compact('bidang', 'agama'));
    }


    public function register_store(Request $request)
    {

        $validasi = Validator::make($request->all(), [
            'nama' => 'required|min:1',
            'nik' => 'required|min:16|max:16',
            'email' => 'required|unique:users,email|email',
            'no_hp' => 'required|min:10|max:13',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha',
            'bidang' => 'required|array|min:1',
            'password' => 'required|alpha_num',
            'confirm' => 'required|same:password',
            'g-recaptcha-response' => 'required|captcha',
        ]);


        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }
        $validasi->validate();
        try {
            $data = $request->only('nama', 'nik', 'email', 'no_hp', 'jenis_kelamin', 'agama',);

            DB::beginTransaction();

            $user = new User();
            $user->nama = $request->nama;
            $user->nik = $request->nik;
            $user->email = $request->email;
            $user->no_hp = $request->no_hp;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->password = $request->password;
            $user->save();

            $data['bidang'] = implode('|', $request->bidang);
            Tbl_tenaga_kebudayaan::create($data);

            DB::commit();

            return  redirect()->route('login')->with('regis', [
                'title' => 'Data Berhasil Disimpan',
                'message' => 'Silahkan tunggu konfirmasi dari admin untuk pendaftaran akun.',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return  redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }


    public function auth(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required'],
                'password' => ['required'],
                'g-recaptcha-response' => 'required|captcha',
            ],
            [
                'required' => ':attribute Wajib Di Isi.',
                'captcha' => 'Captcha Tidak Sesuai.',
                'g-recaptcha-response.required' => 'Captcha Harus Di Isi.',
            ]
        );

        if (FacadesAuth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'verify' => 1
        ])) {
            $request->session()->regenerate();

            return redirect()->route('landing.dashboard')->with('info', 'Selamat Datang ' . FacadesAuth::user()->nama);
        }
        return redirect()->back()->with('warning', 'Akun tidak ditemukan atau belum diverifikasi.');
    }



    public function logOut(Request $request): RedirectResponse
    {
        FacadesAuth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
