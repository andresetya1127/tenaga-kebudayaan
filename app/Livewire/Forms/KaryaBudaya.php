<?php

namespace App\Livewire\Forms;

use App\Models\Tbl_karya_budaya;
use Illuminate\Support\Facades\DB;
use Livewire\Form;

class KaryaBudaya extends Form
{
    public $id;
    public $nama_karya;
    public $jenis_karya = [];
    public $tahun_tercipta;
    public $nama_pencipta;
    public $no_hp_pelestari;
    public $kecamatan;
    public $desa;
    public $alamat;
    public $nik;
    public $email;
    public $facebook;
    public $instagram;
    public $deskripsi_karya;
    public $jumlah_pendukung;
    public $kostum_properti;
    public $alat;
    public $sinopsis;
    public $pentas;
    public $latitude;
    public $longitude;
    public $penghargaan;
    public $foto;
    public $imgPush = [];


    public function rules($data = [])
    {

        $rule = [
            'nama_karya' => 'required|max:200',
            'jenis_karya' => 'required|max:150',
            'tahun_tercipta' => 'required|regex:/^[0-9]*$/|min:4|max:4',
            'nama_pencipta' => 'required|max:150',
            'no_hp_pelestari' => 'required|min:11|max:12|regex:/^[0-9]*$/',
            'kecamatan' => 'required|exists:districts,id',
            'desa' => 'required|exists:villages,id',
            'alamat' => 'required',
            'nik' => 'required|min:16|max:16|regex:/^[0-9]*$/',
            'email' => 'required|max:150|email',
            'facebook' => 'required|max:150',
            'instagram' => 'required|max:150',
            'deskripsi_karya' => 'required',
            'jumlah_pendukung' => 'required|numeric|min:1',
            'kostum_properti' => 'required|max:200',
            'alat' => 'required',
            'sinopsis' => 'required',
            'pentas' => 'required|max:200',
            'penghargaan' => 'required',
            'dokumen' => 'required|file|mimes:pdf|max:2048',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'video' =>  'required|url:http,https',
        ];

        $fixRule = [];

        foreach ($data as $key) {
            $fixRule[$key] = $rule[$key];
        }

        return $fixRule;
    }

    public function setData($id)
    {
        $data = Tbl_karya_budaya::find($id);
        $this->id = $data->id_karya_budaya;
        $this->nama_karya = $data->nama_karya;
        $this->jenis_karya = explode(',', $data->jenis_karya);
        $this->tahun_tercipta = $data->tahun_tercipta;
        $this->nama_pencipta = $data->nama_pencipta;
        $this->no_hp_pelestari = $data->no_hp_pelestari;
        $this->alamat = $data->alamat;
        $this->nik = $data->nik;
        $this->email = $data->email;
        $this->facebook = $data->facebook;
        $this->instagram = $data->instagram;
        $this->deskripsi_karya = $data->deskripsi_karya;
        $this->jumlah_pendukung = $data->jumlah_pendukung;
        $this->kostum_properti = $data->kostum_properti;
        $this->alat = $data->alat;
        $this->sinopsis = $data->sinopsis;
        $this->pentas = $data->pentas;
        $this->longitude = $data->longitude;
        $this->latitude = $data->latitude;
        $this->penghargaan = $data->penghargaan;
        $this->foto = $data->foto;
        $this->imgPush = $data->foto ?? null ? explode('||', $data->foto) : [];
    }

    public function store()
    {
        $nameField = [];

        foreach ($this->imgPush as $img) {
            $filename = md5($img . microtime()) . '.' . $img->getClientOriginalExtension();
            $img->storeAs('public/photos', $filename);
            array_push($nameField, $filename);
        }

        $data = new Tbl_karya_budaya();

        $data->nama_karya = $this->nama_karya;
        $data->jenis_karya = implode(',', $this->jenis_karya);
        $data->tahun_tercipta = $this->tahun_tercipta;
        $data->nama_pencipta = $this->nama_pencipta;
        $data->no_hp_pelestari = $this->no_hp_pelestari;
        $data->alamat = $this->alamat;
        $data->nik = $this->nik;
        $data->email = $this->email;
        $data->facebook = $this->facebook;
        $data->instagram = $this->instagram;
        $data->longitude = $this->longitude;
        $data->latitude = $this->latitude;
        $data->deskripsi_karya = $this->deskripsi_karya;
        $data->jumlah_pendukung = $this->jumlah_pendukung;
        $data->kostum_properti = $this->kostum_properti;
        $data->alat = $this->alat;
        $data->sinopsis = $this->sinopsis;
        $data->foto = implode('||', $nameField);
        $data->pentas = $this->pentas;
        $data->id_user = auth()->user()->id;
        $data->penghargaan = $this->penghargaan;
        if (auth()->user()->role == 1) {
            $data->status = 1;
        }
        $data->save();
        $this->reset();
    }

    public function update()
    {
        $data = Tbl_karya_budaya::find($this->id);

        $data->nama_karya = $this->nama_karya;
        $data->jenis_karya = implode(',', $this->jenis_karya);
        $data->tahun_tercipta = $this->tahun_tercipta;
        $data->nama_pencipta = $this->nama_pencipta;
        $data->no_hp_pelestari = $this->no_hp_pelestari;
        $data->alamat = $this->alamat;
        $data->longitude = $this->longitude;
        $data->latitude = $this->latitude;
        $data->nik = $this->nik;
        $data->email = $this->email;
        $data->facebook = $this->facebook;
        $data->instagram = $this->instagram;
        $data->deskripsi_karya = $this->deskripsi_karya;
        $data->jumlah_pendukung = $this->jumlah_pendukung;
        $data->kostum_properti = $this->kostum_properti;
        $data->alat = $this->alat;
        $data->sinopsis = $this->sinopsis;
        $data->pentas = $this->pentas;
        $data->penghargaan = $this->penghargaan;
        $data->save();
    }
}
