<?php

namespace App\Livewire\Forms;

use App\Models\Tbl_lembaga_komunitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LembagaBudaya extends Form
{
    public $id, $nama_lembaga, $jenis_lembaga, $nama_ketua, $no_ketua,
        $nik_ketua, $tgl_pendirian, $akte_pendirian, $npwp, $alamat_sekretariat, $email,
        $facebook, $instagram, $youtube, $jumlah_anggota, $susunan_pengurus, $uraian_aktivitas, $dokumen,
        $foto, $imgPush = [], $longitude, $latitude, $kecamatan, $desa;

    public function rules($data = [])
    {
        $enum =  Tbl_lembaga_komunitas::getModel()->getEnum('jenis_lembaga');
        $rule = [
            'nama_lembaga' => 'required|max:150',
            'jenis_lembaga' => 'required|max:150|in:' . implode(',', $enum),
            'nama_ketua' => 'required|max:150',
            'kecamatan' => 'required|exists:districts,id',
            'desa' => 'required|exists:villages,id',
            'no_ketua' => 'required|regex:/^[0-9]*$/|min:11|max:12',
            'nik_ketua' =>  'required|regex:/^[0-9]*$/|min:16|max:16',
            'tgl_pendirian' => 'required|date',
            'akte_pendirian' => 'regex:/^[0-9]*$/|min:16|max:16',
            'npwp' =>  'regex:/^[0-9]*$/|min:16|max:16',
            'alamat_sekretariat' => 'required',
            'email' => 'required|max:150|email',
            'facebook' => 'required|max:150',
            'instagram' => 'required|max:150',
            'youtube' => 'required|max:255|url',
            'jumlah_anggota' => 'required|numeric|min:0|max:1000000',
            'susunan_pengurus' => 'required',
            'uraian_aktivitas' => 'required',
            'dokumen' => 'required|file|max:2048|mimes:pdf',
            'foto' => 'required|image|max:2048|mimes:jpg,jpeg,png',
        ];

        $fixRule = [];

        foreach ($data as  $value) {
            $fixRule[$value] = $rule[$value];
        }

        return $fixRule;
    }


    public function store()
    {


        $nameField = [];

        foreach ($this->imgPush as $img) {
            $filename = md5($img . microtime()) . '.' . $img->getClientOriginalExtension();
            $img->storeAs('public/photos', $filename);
            array_push($nameField, $filename);
        }


        $data = new Tbl_lembaga_komunitas();



        $data->kabupaten = '52.02';
        $data->nama_lembaga = $this->nama_lembaga;
        $data->jenis_lembaga = $this->jenis_lembaga;
        $data->nama_ketua = $this->nama_ketua;
        $data->no_ketua = $this->no_ketua;
        $data->nik_ketua = $this->nik_ketua;
        $data->tgl_pendirian = $this->tgl_pendirian;
        $data->akte_pendirian = $this->akte_pendirian;
        $data->npwp = $this->npwp;
        $data->latitude = $this->latitude;
        $data->longitude = $this->longitude;
        $data->id_kec = $this->kecamatan;
        $data->id_desa = $this->desa;
        $data->alamat_sekretariat = $this->alamat_sekretariat;
        $data->email = $this->email;
        $data->facebook = $this->facebook;
        $data->instagram = $this->instagram;
        $data->youtube = $this->youtube;
        $data->jumlah_anggota = $this->jumlah_anggota;
        $data->susunan_pengurus = $this->susunan_pengurus;
        $data->uraian_aktivitas = $this->uraian_aktivitas;

        $data->save();

        $this->reset();
    }

    public function setData($id)
    {
        $data = Tbl_lembaga_komunitas::find($id);
        $this->id = $data->id_lembaga;
        $this->nama_lembaga = $data->nama_lembaga;
        $this->jenis_lembaga = $data->jenis_lembaga;
        $this->nama_ketua = $data->nama_ketua;
        $this->no_ketua = $data->no_ketua;
        $this->nik_ketua = $data->nik_ketua;
        $this->tgl_pendirian = $data->tgl_pendirian;
        $this->akte_pendirian = $data->akte_pendirian;
        $this->npwp = $data->npwp;
        $this->alamat_sekretariat = $data->alamat_sekretariat;
        $this->longitude = $data->longitude;
        $this->latitude = $data->latitude;
        $this->kecamatan = $data->id_kec;
        $this->desa = $data->id_desa;
        $this->email = $data->email;
        $this->facebook = $data->facebook;
        $this->instagram = $data->instagram;
        $this->youtube = $data->youtube;
        $this->jumlah_anggota = $data->jumlah_anggota;
        $this->susunan_pengurus = $data->susunan_pengurus;
        $this->uraian_aktivitas = $data->uraian_aktivitas;
        $this->foto = $data->foto;
        $this->imgPush = $data->foto ?? null ? explode('||', $data->foto) : [];
        $this->dokumen = $data->dokumen;
    }

    public function update()
    {

        $data = Tbl_lembaga_komunitas::find($this->id);

        DB::beginTransaction();

        $data->nama_lembaga = $this->nama_lembaga;
        $data->jenis_lembaga = $this->jenis_lembaga;
        $data->nama_ketua = $this->nama_ketua;
        $data->no_ketua = $this->no_ketua;
        $data->nik_ketua = $this->nik_ketua;
        $data->tgl_pendirian = $this->tgl_pendirian;
        $data->akte_pendirian = $this->akte_pendirian;
        $data->npwp = $this->npwp;
        $data->latitude = $this->latitude;
        $data->longitude = $this->longitude;
        $data->id_kec = $this->kecamatan;
        $data->id_desa = $this->desa;
        $data->alamat_sekretariat = $this->alamat_sekretariat;
        $data->email = $this->email;
        $data->facebook = $this->facebook;
        $data->instagram = $this->instagram;
        $data->youtube = $this->youtube;
        $data->jumlah_anggota = $this->jumlah_anggota;
        $data->susunan_pengurus = $this->susunan_pengurus;
        $data->uraian_aktivitas = $this->uraian_aktivitas;
        DB::commit();

        $data->save();

        $this->reset();
    }
}
