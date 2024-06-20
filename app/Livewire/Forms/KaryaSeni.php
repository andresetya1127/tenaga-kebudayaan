<?php

namespace App\Livewire\Forms;

use App\Models\Tbl_karya_seni;
use Illuminate\Support\Facades\DB;
use Livewire\Form;

class KaryaSeni extends Form
{
    public $id,
        $judul,
        $cabang_seni = [],
        // $asal_daerah,
        $tahun_tercipta,
        $nama_pencipta,
        $no_hp_pelestari,
        $kecamatan,
        $desa,
        $alamat,
        $nik,
        $email,
        $facebook,
        $instagram,
        $deskripsi_karya,
        $jumlah_pendukung,
        $kostum_properti,
        $alat,
        $sinopsis,
        $pentas,
        $penghargaan,
        $dokumen,
        $video,
        $foto,
        $latitude,
        $longitude,
        $imgPush = [];

    public function rules($data)
    {
        $cabang = new Tbl_karya_seni();

        $rule = [
            'judul' => 'required|max:150',
            'cabang_seni' => 'required|max:150',
            'asal_daerah' => 'required',
            'tahun_tercipta' => 'required|regex:/^[0-9]*$/|min:4|max:4',
            'nama_pencipta' => 'required|max:150',
            'no_hp_pelestari' => 'required|regex:/^[0-9]*$/|min:11|max:12',
            'kecamatan' => 'required|exists:districts,id',
            'desa' => 'required|exists:villages,id',
            'alamat' => 'required',
            'nik' => 'required|max:16|min:16|regex:/^[0-9]*$/',
            'email' => 'max:150|email',
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
            'video' =>   'required|url:http,https',
        ];



        $fixRule = [];

        foreach ($data as $key) {
            $fixRule[$key] = $rule[$key];
        }


        return $fixRule;
    }

    public function setData($id)
    {
        $data = Tbl_karya_seni::find($id);
        $this->id = $data->id_karya_seni;
        $this->judul = $data->judul;
        $this->cabang_seni = explode(',', $data->cabang_seni);
        // $this->asal_daerah = $data->asal_daerah;
        $this->longitude = $data->longitude;
        $this->latitude = $data->latitude;
        $this->tahun_tercipta = $data->tahun_tercipta;
        $this->nama_pencipta = $data->nama_pencipta;
        $this->no_hp_pelestari = $data->no_hp_pelestari;
        $this->kecamatan = $data->id_kec;
        $this->desa = $data->id_desa;
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
        $this->penghargaan = $data->penghargaan;
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



        $data = new Tbl_karya_seni();


        $data->judul = $this->judul;
        $data->cabang_seni = implode(',', $this->cabang_seni);
        // // $data->asal_daerah = $this->asal_daerah;
        $data->longitude = $this->longitude;
        $data->latitude = $this->latitude;
        $data->tahun_tercipta = $this->tahun_tercipta;
        $data->nama_pencipta = $this->nama_pencipta;
        $data->no_hp_pelestari = $this->no_hp_pelestari;
        $data->id_kec = $this->kecamatan;
        $data->id_desa = $this->desa;
        $data->alamat = $this->alamat;
        $data->nik = $this->nik;
        $data->email = $this->email;
        $data->longitude = $this->longitude;
        $data->latitude = $this->latitude;
        $data->facebook = $this->facebook;
        $data->instagram = $this->instagram;
        $data->deskripsi_karya = $this->deskripsi_karya;
        $data->jumlah_pendukung = $this->jumlah_pendukung;
        $data->kostum_properti = $this->kostum_properti;
        $data->alat = $this->alat;
        $data->sinopsis = $this->sinopsis;
        $data->pentas = $this->pentas;
        $data->penghargaan = $this->penghargaan;
        $data->dokumen = $this->dokumen;
        $data->video = $this->video;
        $data->foto = implode('||', $nameField);
        $data->id_user = auth()->user()->id;

        if (auth()->user()->role == 1) {
            $data->status = 1;
        }


        $data->save();

        $this->reset();
    }


    public function update()
    {
        $data = Tbl_karya_seni::find($this->id);

        DB::beginTransaction();
        $data->judul = $this->judul;
        $data->cabang_seni = implode(',', $this->cabang_seni);
        // // $data->asal_daerah = $this->asal_daerah;
        $data->tahun_tercipta = $this->tahun_tercipta;
        $data->nama_pencipta = $this->nama_pencipta;
        $data->no_hp_pelestari = $this->no_hp_pelestari;
        $data->id_kec = $this->kecamatan;
        $data->id_desa = $this->desa;
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
        DB::commit();
        $data->save();
    }
}
