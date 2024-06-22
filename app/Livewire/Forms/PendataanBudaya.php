<?php

namespace App\Livewire\Forms;

use App\Models\Tbl_tenaga_kebudayaan;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Form;

class PendataanBudaya extends Form
{
    public $id, $nama, $tmpt_lahir, $tgl_lahir, $jk, $pendidikan,
        $agama, $pekerjaan, $no_hp, $alamat, $nik, $email, $facebook,
        $instagram, $youtube, $bidang, $judul_karya_tahun, $penghargaan, $foto, $fotoPush = false;

    public $latitude;
    public $longitude;
    public $kabupaten;
    public $kecamatan;
    public $desa;

    public function rules($data = [])
    {
        $enum = new Tbl_tenaga_kebudayaan();
        $json = Storage::get('public/json/bidang.json');
        $decode = json_decode($json, true);

        $bidang = [];
        foreach ($decode as $key) {
            $bidang =  Arr::collapse([$bidang, $key]);
        }

        $rule = [
            'nama' => 'required|max:150|string',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jk' => 'required|in:L,P',
            'pendidikan' => 'required|in:' . implode(',', $enum->getEnum('pendidikan')),
            'agama' => 'required|in:' . implode(',', $enum->getEnum('agama')),
            'pekerjaan' => 'required|in:' . implode(',', $enum->getEnum('pekerjaan')),
            'no_hp' => 'required|min:12|max:12|regex:/^[0-9]*$/',
            'alamat' => 'required',
            'kecamatan' => 'required|exists:districts,id',
            'desa' => 'required|exists:villages,id',
            'nik' => ['required', 'min:16', 'max:16', 'regex:/^[0-9]*$/', Rule::unique('tbl_tenaga_kebudayaans', 'nik')->ignore($this->id, 'id_tenaga_kebudayaan')],
            'email' => ['email', Rule::unique('tbl_tenaga_kebudayaans', 'email')->ignore($this->id, 'id_tenaga_kebudayaan')],
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' =>  'required|url:http,https',
            'bidang' => ['min:1', 'max:5', 'array', Rule::in($bidang)],
            'judul_karya_tahun' => 'required',
            'penghargaan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ];

        $fixRule = [];

        foreach ($data as $key) {
            $fixRule[$key] = $rule[$key];
        }


        return $fixRule;
    }


    public function setData()
    {
        $data = Tbl_tenaga_kebudayaan::find($this->id);
        $this->id = $data->id_tenaga_kebudayaan;
        $this->nama = $data->nama;
        $this->tmpt_lahir = $data->tmpt_lahir;
        $this->tgl_lahir = $data->tgl_lahir;
        $this->jk = $data->jenis_kelamin;
        $this->pendidikan = $data->pendidikan;
        $this->agama = $data->agama;
        $this->pekerjaan = $data->pekerjaan;
        $this->no_hp = $data->no_hp;
        $this->longitude = $data->longitude;
        $this->latitude = $data->latitude;
        $this->kecamatan = $data->id_kec;
        $this->desa = $data->id_desa;
        $this->alamat = $data->alamat;
        $this->nik = $data->nik;
        $this->email = $data->email;
        $this->facebook = $data->facebook;
        $this->instagram = $data->instagram;
        $this->youtube = $data->youtube;
        $this->bidang = explode('|', $data->bidang);
        $this->judul_karya_tahun = $data->judul_karya_tahun;
        $this->penghargaan = $data->penghargaan;
        $this->foto = $data->foto;
    }

    public function store()
    {


        $data = [
            'nama' => $this->nama,
            'tmpt_lahir' => $this->tmpt_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jk,
            'pendidikan' => $this->pendidikan,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
            'no_hp' => $this->no_hp,
            'id_kec' => $this->kecamatan,
            'id_desa' => $this->desa,
            'alamat' => $this->alamat,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'nik' => $this->nik,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'bidang' => implode('|', $this->bidang),
            'judul_karya_tahun' => $this->judul_karya_tahun,
            'penghargaan' => $this->penghargaan,
        ];

        if (Auth::user()->role == 1) {
            $data['status'] = 1;
        }

        $filename = '';

        if ($this->foto instanceof UploadedFile) {
            $filename = md5($this->foto . microtime()) . '.' . $this->foto->getClientOriginalExtension();
            $this->foto->storeAs('public/photos', $filename);

            $data['foto'] = $filename;
        }

        $tenaga = Tbl_tenaga_kebudayaan::create($data);

        User::insert([
            'nama' => $this->nama,
            'nik' => $this->nik,
            'no_hp' => $this->no_hp,
            'jenis_kelamin' => $this->jk,
            'email' => $this->email,
            'password' => Hash::make($this->nik),
            'foto' => $filename,
            'id_tenaga_kebudayaan' => $tenaga->id_tenaga_kebudayaan
        ]);



        $this->reset();
    }

    public function update()
    {


        try {
            $data = Tbl_tenaga_kebudayaan::with('user')->find($this->id);
            DB::beginTransaction();

            $col = [
                'nama' => $this->nama,
                'tmpt_lahir' => $this->tmpt_lahir,
                'tgl_lahir' => $this->tgl_lahir,
                'jenis_kelamin' => $this->jk,
                'pendidikan' => $this->pendidikan,
                'agama' => $this->agama,
                'pekerjaan' => $this->pekerjaan,
                'no_hp' => $this->no_hp,
                'id_kec' => $this->kecamatan,
                'id_desa' => $this->desa,
                'alamat' => $this->alamat,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'nik' => $this->nik,
                'email' => $this->email,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'youtube' => $this->youtube,
                'bidang' => implode('|', $this->bidang),
                'judul_karya_tahun' => $this->judul_karya_tahun,
                'penghargaan' => $this->penghargaan,
            ];

            if ($this->fotoPush) {
                $filename = md5($this->foto . microtime()) . '.' . $this->foto->getClientOriginalExtension();
                if (Storage::exists('public/photos/' . $data->foto)) {
                    Storage::delete('public/photos/' . $data->foto);
                    $this->foto->storeAs('public/photos', $filename);
                } else {
                    $this->foto->storeAs('public/photos', $filename);
                }
                $col['foto'] =  $filename;
            } else {
                if (Storage::exists('public/photos/' . $data->foto)) {
                    Storage::delete('public/photos/' . $data->foto);
                }
            }

            $data->update($col);
            $data->user->update($col);


            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
