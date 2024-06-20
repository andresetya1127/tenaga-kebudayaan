<?php

namespace App\Livewire\Wbtb;

use App\Livewire\Forms\WbtbForm;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;
    public WbtbForm $form;

    public function mount()
    {
        $this->form->kode = "REG/" . date('Y/m/d');
    }

    public function render()
    {
        return view('livewire.wbtb.add', [
            'page' => 'Tambah Data Warisan Budaya Tak Benda',
            'kecamatan' => Kecamatan::where('regency_id', 5202)->get(),
            'desa' => Desa::where('district_id', $this->form->kecamatan)->get()
        ]);
    }


    public function add()
    {
        $validate =  Validator::make(
            $this->form->all(),
            $this->form->rules([
                'nama_warisan',
                'tingkatan_data',
                'tgl_pendataan',
                'tgl_verifikasi',
                'tgl_penetapan',
                'sebaran_kabupaten',
                'entitas_kebudayaan',
                'domain_wbtb',
                'kategori_wbtb',
                'nama_objek',
                'wilayah_level',
                'kondisi_sekarang',
                'kecamatan',
                'desa',
                'tgl_penerimaan',
                'tempat_penerimaan',
                'nama_petugas',
                'nama_lembaga',
                'nama_sdm',
                'deskripsi',
                'youtube'
            ])
        );

        if ($validate->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan Isi Data WBTB Dengan Benar.', icon: 'warning');
        }
        $validate->validated();

        try {
            $this->form->saveWbtb();

            $this->dispatch('alert-confirm', title: 'Data WBTB Berhasil Disimpan.', rute: route('index.wbtb'), icon: 'success');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->dispatch('sweat-alert', title: 'Data WBTB Gagal Disimpan.', icon: 'error');
        }
    }

    public function updatedFormFoto()
    {
        $validator = Validator::make(
            $this->form->only('foto'),
            $this->form->rules(['foto'])
        );

        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal diunggah.', icon: 'warning');
        }
        $validator->validated();


        try {
            array_push($this->form->imgPush, $this->form->foto);

            $this->dispatch('sweat-alert', title: 'Gambar berhasil diunggah.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: $th->getMessage(), icon: 'error');
        }
    }


    public function deleteImg($key)
    {
        unset($this->form->imgPush[$key]);
        $this->dispatch('sweat-alert', title: 'Gambar berhasil dihapus.', icon: 'success');
    }
}
