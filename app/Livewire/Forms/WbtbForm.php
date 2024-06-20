<?php

namespace App\Livewire\Forms;

use App\Models\Wbtb;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WbtbForm extends Form
{
    #[Locked]
    public $id;

    #[Locked]
    public $kode;

    public $nama_warisan;
    public $tingkatan_data;
    public $tgl_pendataan;
    public $tgl_verifikasi;
    public $tgl_penetapan;
    public $sebaran_kabupaten;
    public $entitas_kebudayaan;
    public $domain_wbtb;
    public $kategori_wbtb;
    public $nama_objek;
    public $wilayah_level;
    public $kondisi_sekarang;
    public $tgl_penerimaan;
    public $tempat_penerimaan;
    public $nama_petugas;
    public $nama_lembaga;
    public $nama_sdm;
    public $deskripsi;
    public $kecamatan;
    public $desa;
    public $latitude;
    public $longitude;
    public $foto;
    public $youtube;
    public $dokumen;

    public $imgPush = [];



    public function rules($data = [])
    {
        $rule = [
            'kode' => 'required|max:30',
            'nama_warisan' => 'required|max:200|string',
            'tingkatan_data' => 'required|max:150',
            'tgl_pendataan' => 'required|date',
            'tgl_verifikasi' => 'required|date',
            'tgl_penetapan' => 'required|date',
            'sebaran_kabupaten' => 'required|max:20',
            'entitas_kebudayaan' => 'required',
            'domain_wbtb' => 'required',
            'kategori_wbtb' => 'required',
            'nama_objek' => 'required',
            'wilayah_level' => 'required',
            'kondisi_sekarang' => 'required',
            'tgl_penerimaan' => 'required|date',
            'tempat_penerimaan' => 'required',
            'nama_petugas' => 'required|max:200',
            'nama_lembaga' => 'required|max:200',
            'nama_sdm' => 'required|max:200',
            'kecamatan' => 'required|exists:districts,id',
            'desa' => 'required|exists:villages,id',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube' =>  'required',
            // 'dokumen' => 'required'
        ];


        $fixRule = [];

        foreach ($data  as $key) {
            $fixRule[$key] = $rule[$key];
        }

        return $fixRule;
    }


    public function saveWbtb()
    {

        $nameField = [];

        foreach ($this->imgPush as $img) {
            $filename = md5($img . microtime()) . '.' . $img->getClientOriginalExtension();
            $img->storeAs('public/photos', $filename);
            array_push($nameField, $filename);
        }


        $wbtb = new Wbtb();
        $wbtb->nomor_wbtb = $this->kode;
        $wbtb->nama_warisan = $this->nama_warisan;
        $wbtb->tingkatan_data = $this->tingkatan_data;
        $wbtb->tgl_pendataan = $this->tgl_pendataan;
        $wbtb->tgl_verifikasi = $this->tgl_verifikasi;
        $wbtb->tgl_penetapan = $this->tgl_penetapan;
        $wbtb->sebaran_kabupaten = $this->sebaran_kabupaten;
        $wbtb->entitas_kebudayaan = $this->entitas_kebudayaan;
        $wbtb->domain_wbtb = $this->domain_wbtb;
        $wbtb->kategori_wbtb = $this->kategori_wbtb;
        $wbtb->nama_objek = $this->nama_objek;
        $wbtb->wilayah_level = $this->wilayah_level;
        $wbtb->kondisi_sekarang = $this->kondisi_sekarang;
        $wbtb->kondisi_sekarang = $this->kondisi_sekarang;
        $wbtb->kabupaten = '5202';
        $wbtb->kecamatan = $this->kecamatan;
        $wbtb->desa = $this->desa;
        $wbtb->latitude = $this->latitude;
        $wbtb->longitude = $this->longitude;
        $wbtb->tgl_penerimaan = $this->tgl_penerimaan;
        $wbtb->tempat_penerimaan = $this->tempat_penerimaan;
        $wbtb->nama_petugas = $this->nama_petugas;
        $wbtb->nama_lembaga = $this->nama_lembaga;
        $wbtb->nama_sdm = $this->nama_sdm;
        $wbtb->deskripsi = $this->deskripsi;
        $wbtb->foto = implode('||', $nameField);
        $wbtb->youtube = $this->youtube;
        $wbtb->dokumen = $this->dokumen;
        $wbtb->status = 0;
        $wbtb->save();

        $this->reset();
    }

    public function editWbtb()
    {
        $wbtb =  Wbtb::findOrFail($this->id);
        $wbtb->nama_warisan = $this->nama_warisan;
        $wbtb->tingkatan_data = $this->tingkatan_data;
        $wbtb->tgl_pendataan = $this->tgl_pendataan;
        $wbtb->tgl_verifikasi = $this->tgl_verifikasi;
        $wbtb->tgl_penetapan = $this->tgl_penetapan;
        $wbtb->sebaran_kabupaten = $this->sebaran_kabupaten;
        $wbtb->entitas_kebudayaan = $this->entitas_kebudayaan;
        $wbtb->domain_wbtb = $this->domain_wbtb;
        $wbtb->kategori_wbtb = $this->kategori_wbtb;
        $wbtb->nama_objek = $this->nama_objek;
        $wbtb->wilayah_level = $this->wilayah_level;
        $wbtb->kondisi_sekarang = $this->kondisi_sekarang;
        $wbtb->kabupaten = '5202';
        $wbtb->kecamatan = $this->kecamatan;
        $wbtb->desa = $this->desa;
        $wbtb->latitude = $this->latitude;
        $wbtb->longitude = $this->longitude;
        $wbtb->tgl_penerimaan = $this->tgl_penerimaan;
        $wbtb->tempat_penerimaan = $this->tempat_penerimaan;
        $wbtb->nama_petugas = $this->nama_petugas;
        $wbtb->nama_lembaga = $this->nama_lembaga;
        $wbtb->nama_sdm = $this->nama_sdm;
        $wbtb->deskripsi = $this->deskripsi;
        $wbtb->youtube = $this->youtube;
        $wbtb->dokumen = $this->dokumen;
        $wbtb->save();
    }

    public function setData()
    {
        $wbtb =  Wbtb::findOrFail($this->id);
        $this->kode = $wbtb->kode;
        $this->nama_warisan = $wbtb->nama_warisan;
        $this->tingkatan_data = $wbtb->tingkatan_data;
        $this->tgl_pendataan = $wbtb->tgl_pendataan;
        $this->tgl_verifikasi = $wbtb->tgl_verifikasi;
        $this->tgl_penetapan = $wbtb->tgl_penetapan;
        $this->sebaran_kabupaten = $wbtb->sebaran_kabupaten;
        $this->entitas_kebudayaan = $wbtb->entitas_kebudayaan;
        $this->domain_wbtb = $wbtb->domain_wbtb;
        $this->kategori_wbtb = $wbtb->kategori_wbtb;
        $this->longitude = $wbtb->longitude;
        $this->latitude = $wbtb->latitude;
        $this->kecamatan = $wbtb->kecamatan;
        $this->desa = $wbtb->desa;
        $this->nama_objek = $wbtb->nama_objek;
        $this->wilayah_level = $wbtb->wilayah_level;
        $this->kondisi_sekarang = $wbtb->kondisi_sekarang;
        $this->tgl_penerimaan = $wbtb->tgl_penerimaan;
        $this->tempat_penerimaan = $wbtb->tempat_penerimaan;
        $this->nama_petugas = $wbtb->nama_petugas;
        $this->nama_lembaga = $wbtb->nama_lembaga;
        $this->nama_sdm = $wbtb->nama_sdm;
        $this->deskripsi = $wbtb->deskripsi;
        $this->youtube = $wbtb->youtube;
        $this->dokumen = $wbtb->dokumen;
        $this->imgPush = $wbtb->foto ?? null ? explode('||', $wbtb->foto) : [];
    }
}
