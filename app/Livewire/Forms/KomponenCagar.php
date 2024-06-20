<?php

namespace App\Livewire\Forms;

use App\Models\Tbl_detail_cagar_budaya;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Form;

class KomponenCagar extends Form
{
    public $kategori_objek, $nama_objek, $keberadaan_objek, $lokasi_penyimpanan,
        $koordinat, $ukuran, $bahan_utama, $batas_lain, $kondisi, $nama_pemilik,
        $alamat, $riwayat, $latar_sejarah, $deskripsi;

    public function store($id)
    {
        $data = new Tbl_detail_cagar_budaya();

        $validate = Validator::make(
            [
                'kategori_objek' => $this->kategori_objek,
                'nama_objek' => $this->nama_objek,
                'keberadaan_objek' => $this->keberadaan_objek,
                'lokasi_penyimpanan' => $this->lokasi_penyimpanan,
                'koordinat' => $this->koordinat,
                'ukuran' => $this->ukuran,
                'bahan_utama' => $this->bahan_utama,
                'batas_lain' => $this->batas_lain,
                'kondisi' => $this->kondisi,
                'nama_pemilik' => $this->nama_pemilik,
                'alamat' => $this->alamat,
                'riwayat' => $this->riwayat,
                'latar_sejarah' => $this->latar_sejarah,
                'deskripsi' => $this->deskripsi,
            ],
            [
                'kategori_objek' => 'required|in:' . implode(',', $data->getEnum('kategori_objek')),
                'nama_objek'  => 'required|min:5',
                'keberadaan_objek'  => 'required|in:' . implode(',', $data->getEnum('keberadaan_objek')),
                'lokasi_penyimpanan'  => 'required|in:' . implode(',', $data->getEnum('lokasi_penyimpanan')),
                'koordinat'  => 'required|min:5',
                'ukuran'  => 'required|in:' . implode(',', $data->getEnum('ukuran')),
                'bahan_utama'  => 'required',
                'batas_lain'  => 'required|in:' . implode(',', $data->getEnum('batas_lain')),
                'kondisi'  => 'required|in:' . implode(',', $data->getEnum('kondisi')),
                'nama_pemilik'  => 'required',
                'alamat'  => 'required|min:5',
                'riwayat'  => 'required|min:5',
                'latar_sejarah'  => 'required|min:5',
                'deskripsi'  => 'required|min:5',
            ],
            [
                'required' => 'Form  Harus Diisi.',
                'numeric' => 'Form harus berupa angka.',
                'email' => 'Form harus berupa alamat email yang valid.',
                'in' => 'Form yang dipilih tidak valid.',
                'min' => 'Form minimal bernilai :min.',
                'date' => 'Form bukan tanggal yang valid.',
                'string' => 'Form harus berupa string.',

            ]
        )->validate();

        DB::beginTransaction();
        try {
            $data->kategori_objek = $this->kategori_objek;
            $data->nama_objek = $this->nama_objek;
            $data->keberadaan_objek = $this->keberadaan_objek;
            $data->lokasi_penyimpanan = $this->lokasi_penyimpanan;
            $data->koordinat = $this->koordinat;
            $data->ukuran = $this->ukuran;
            $data->bahan_utama = $this->bahan_utama;
            $data->batas_lain = $this->batas_lain;
            $data->kondisi = $this->kondisi;
            $data->nama_pemilik = $this->nama_pemilik;
            $data->alamat = $this->alamat;
            $data->riwayat = $this->riwayat;
            $data->latar_sejarah = $this->latar_sejarah;
            $data->deskripsi = $this->deskripsi;
            $data->id_cagar_budaya = $id;
            DB::commit();
            $data->save();


            $this->reset();

            redirect()->route('index.cagar_budaya')->with('alert', [
                'type' => 'success',
                'message' => 'Data Berhasil Ditambah.'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
