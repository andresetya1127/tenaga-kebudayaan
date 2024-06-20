<?php

namespace App\Livewire\Forms;

use App\Models\Tbl_odcb;
use Livewire\Form;
use Livewire\Attributes\Locked;
use Livewire\WithFileUploads;

class Odcb extends Form
{
    use WithFileUploads;

    #[Locked]
    public $id_odcb;
    public $nomor_cb;
    public $jenis_cb;
    public $pendaftar;
    public $tgl_pendaftaran;
    public $nama_cagar;
    public $sifat_bangunan;
    public $priode_bangunan;
    public $gaya_arsitektur;
    public $fungsi_bangunan;
    public $bentuk_atap;
    public $provinsi;

    // Step 1
    public $kabupaten;
    public $kecamatan;
    public $desa_kel;
    public $dusun;
    public $alamat;
    public $latitude;
    public $longitude;
    public $ketinggian;
    public $bahan_bangunan;
    public $satuan_waktu;
    public $priode_waktu;
    public $waktu_pembuatan;
    public $ornamen_bangunan;
    public $tanda_bangunan;
    public $warna_bangunan;
    public $panjang;
    public $lebar;
    public $tinggi;
    public $luas_bangunan;
    public $luas_tanah;

    // step 2
    public $keutuhan;
    public $pemeliharaan;
    public $pemugaran;
    public $adaptasi;
    public $status_kepemilikan;
    public $nama_pemilik;
    public $status_perolehan;
    public $provinsi_pemilik;
    public $kabupaten_pemilik;
    public $kecamatan_pemilik;
    public $desa_kel_pemilik;
    public $alamat_pemilik;
    public $latitude_pemilik;
    public $longitude_pemilik;
    public $zona_utara;
    public $zona_selatan;
    public $zona_barat;
    public $zona_timur;

    // step 3
    public $tingkatan_data;
    public $tahun_pendataan;
    public $tahun_verifikasi;
    public $tahun_penetapan;
    public $entitas_kebudayaan;
    public $kategori;
    public $deskripsi;
    public $status_pengelolaan;
    public $foto;
    public $video;
    public $dokumen;

    public $imgPush = [];
    public $peringkat;

    #[Locked]
    public $status;

    #[Locked]
    public $status_draft;


    #[Locked]
    public $detail;





    public function rules($data = [])
    {
        $rule = [
            'peringkat' => 'required|in:1,2,3,4',
            'nomor_cb' => 'required|max:30',
            'jenis_cb' => 'required|max:100|in:Bangunan,Situs,Benda,Struktur',
            'nama_cagar' => 'required|max:150',
            'pendaftar' => 'required|max:100',
            'tgl_pendaftaran' => 'date',
            'sifat_bangunan' => 'required|max:100',
            'priode_bangunan' => 'required|max:100',
            'gaya_arsitektur' => 'required|max:100',
            'fungsi_bangunan' => 'required|max:100',
            'bentuk_atap' => 'required|max:100',
            'provinsi' => 'required|exists:provinces,id',
            'kabupaten' => 'required|max:20|exists:regencies,id',
            'kecamatan' => 'max:20|exists:districts,id',
            'desa_kel' => 'max:100|exists:villages,id',
            'dusun' => 'max:200',
            'alamat' => '|max:100',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'ketinggian' => 'required|max:100',
            'bahan_bangunan' => 'required|max:100',
            'satuan_waktu' => 'required|max:100',
            'priode_waktu' => 'required|max:100',
            'waktu_pembuatan' => 'required|max:100',
            'ornamen_bangunan' => 'required|max:100',
            'tanda_bangunan' => 'required|max:100',
            'warna_bangunan' => 'required|max:100',
            'panjang' => 'required|max:100',
            'lebar' => 'required|max:100',
            'tinggi' => 'required|max:100',
            'luas_bangunan' => 'required|max:100',
            'luas_tanah' => 'required|max:100',
            'keutuhan' => 'required|max:100',
            'pemeliharaan' => 'required|max:100',
            'pemugaran' => 'required|max:100',
            'adaptasi' => 'required|max:100',
            'status_kepemilikan' => 'required|max:100',
            'nama_pemilik' => 'required|max:100',
            'status_perolehan' => 'required|max:100',
            'provinsi_pemilik' => 'required|max:20|exists:provinces,id',
            'kabupaten_pemilik' => 'required|max:20|exists:regencies,id',
            'kecamatan_pemilik' => 'required|max:20|exists:districts,id',
            'desa_kel_pemilik' => 'required|max:20|exists:villages,id',
            'alamat_pemilik' => 'required|max:20',
            'latitude_pemilik' => 'required|max:255',
            'longitude_pemilik' => 'required|max:255',
            'zona_utara' => 'required|max:100',
            'zona_selatan' => 'required|max:100',
            'zona_barat' => 'required|max:100',
            'zona_timur' => 'required|max:100',
            'tingkatan_data' => 'required|max:100',
            'tahun_pendataan' => 'required|max:4|regex:/^[0-9]*$/',
            'tahun_verifikasi' => 'required|max:4|regex:/^[0-9]*$/',
            'tahun_penetapan' => 'required|max:4|regex:/^[0-9]*$/',
            'entitas_kebudayaan' => 'required|max:100',
            'kategori' => 'required|max:100',
            'deskripsi' => 'required',
            'status_pengelolaan' => 'required|max:100',
            'video' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            'dokumen' => 'required',
        ];

        $fixRule = [];

        foreach ($data as $key) {
            $fixRule[$key] = $rule[$key];
        }

        return $fixRule;
    }

    public function register()
    {
        $nameField = [];

        foreach ($this->imgPush as $img) {
            $filename = md5($img . microtime()) . '.' . $img->getClientOriginalExtension();
            $img->storeAs('public/photos', $filename);
            array_push($nameField, $filename);
        }

        $model =  new Tbl_odcb();
        $model->nomor_cb = $this->nomor_cb;
        $model->jenis_cb = $this->jenis_cb;
        $model->pendaftar = $this->pendaftar;
        $model->tgl_pendaftaran = $this->tgl_pendaftaran;
        $model->foto = implode('||', $nameField);
        $model->nama_cagar = $this->nama_cagar;
        $model->kabupaten = $this->kabupaten;
        $model->kecamatan = $this->kecamatan;
        $model->desa_kel = $this->desa_kel;
        $model->alamat = $this->alamat;
        $model->peringkat = $this->peringkat;
        $model->status_draft = 4;
        $model->save();
        $this->id_odcb = $model->id_odcb;
    }

    public function setData($id)
    {
        $model =  Tbl_odcb::find($id);
        $this->peringkat = $model->peringkat;
        $this->nomor_cb = $model->nomor_cb;
        $this->jenis_cb = $model->jenis_cb;
        $this->pendaftar = $model->pendaftar;
        $this->tgl_pendaftaran = $model->tgl_pendaftaran;
        $this->foto = $model->foto;
        $this->nama_cagar = $model->nama_cagar;
        $this->sifat_bangunan = $model->sifat_bangunan;
        $this->priode_bangunan = $model->priode_bangunan;
        $this->gaya_arsitektur = $model->gaya_arsitektur;
        $this->fungsi_bangunan = $model->fungsi_bangunan;
        $this->bentuk_atap = $model->bentuk_atap;
        $this->provinsi = $model->provinsi;
        $this->kabupaten = $model->kabupaten;
        $this->kecamatan = $model->kecamatan;
        $this->desa_kel = $model->desa_kel;
        $this->dusun = $model->dusun;
        $this->alamat = $model->alamat;
        $this->latitude = $model->latitude;
        $this->longitude = $model->longitude;
        $this->ketinggian = $model->ketinggian;
        $this->bahan_bangunan = $model->bahan_bangunan;
        $this->satuan_waktu = $model->satuan_waktu;
        $this->priode_waktu = $model->priode_waktu;
        $this->waktu_pembuatan = $model->waktu_pembuatan;
        $this->ornamen_bangunan = $model->ornamen_bangunan;
        $this->tanda_bangunan = $model->tanda_bangunan;
        $this->warna_bangunan = $model->warna_bangunan;
        $this->panjang = $model->panjang;
        $this->lebar = $model->lebar;
        $this->tinggi = $model->tinggi;
        $this->luas_bangunan = $model->luas_bangunan;
        $this->luas_tanah = $model->luas_tanah;
        $this->keutuhan = $model->keutuhan;
        $this->pemeliharaan = $model->pemeliharaan;
        $this->pemugaran = $model->pemugaran;
        $this->adaptasi = $model->adaptasi;
        $this->status_kepemilikan = $model->status_kepemilikan;
        $this->nama_pemilik = $model->nama_pemilik;
        $this->status_perolehan = $model->status_perolehan;
        $this->provinsi_pemilik = $model->provinsi_pemilik;
        $this->kabupaten_pemilik = $model->kabupaten_pemilik;
        $this->kecamatan_pemilik = $model->kecamatan_pemilik;
        $this->desa_kel_pemilik = $model->desa_kel_pemilik;
        $this->alamat_pemilik = $model->alamat_pemilik;
        $this->latitude_pemilik = $model->latitude_pemilik;
        $this->longitude_pemilik = $model->longitude_pemilik;
        $this->zona_utara = $model->zona_utara;
        $this->zona_selatan = $model->zona_selatan;
        $this->zona_barat = $model->zona_barat;
        $this->zona_timur = $model->zona_timur;
        $this->tingkatan_data = $model->tingkatan_data;
        $this->tahun_pendataan = $model->tahun_pendataan;
        $this->tahun_verifikasi = $model->tahun_verifikasi;
        $this->tahun_penetapan = $model->tahun_penetapan;
        $this->entitas_kebudayaan = $model->entitas_kebudayaan;
        $this->kategori = $model->kategori;
        $this->deskripsi = $model->deskripsi;
        $this->status_pengelolaan = $model->status_pengelolaan;
        $this->imgPush = $model->foto ?? null ? explode('||', $model->foto) : [];
        $this->video = $model->video;
        $this->dokumen = $model->dokumen;
    }

    public function stepOne($id)
    {
        $model =  Tbl_odcb::find($id);
        $model->status_draft = 2;
        $model->save();
    }

    public function stepTwo($id)
    {
        $model =  Tbl_odcb::find($id);
        $model->status_draft = 3;
        $model->save();
    }

    public function stepThree($id)
    {
        $model =  Tbl_odcb::find($id);
        $model->status_draft = 4;
        $model->save();
    }
}
