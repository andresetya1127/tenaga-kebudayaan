<?php

namespace App\Livewire\KaryaSeni;

use App\Livewire\Forms\KaryaSeni;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Tbl_karya_seni;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public KaryaSeni $form;

    public function render()
    {
        $data =  Tbl_karya_seni::getModel()->getEnum();
        return view('livewire.karya-seni.add', [
            'page' => 'Form Pendataan Karya Seni',
            'data' => $data,
            'kecamatan' => Kecamatan::where('regency_id', 5202)->get(),
            'desa' => Desa::where('district_id', $this->form->kecamatan)->get()
        ]);
    }

    public function add()
    {

        $validate = Validator::make(
            $this->form->all(),
            $this->form->rules([
                'judul',
                'cabang_seni',
                // 'asal_daerah',
                'tahun_tercipta',
                'nama_pencipta',
                'no_hp_pelestari',
                'alamat',
                'kecamatan',
                'desa',
                'nik',
                'email',
                'facebook',
                'instagram',
                'deskripsi_karya',
                'jumlah_pendukung',
                'kostum_properti',
                'alat',
                'sinopsis',
                'pentas',
                'penghargaan',
            ])
        );

        if ($validate->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan Isi Form Dengan Benar.', icon: 'warning');
        }

        $validate->validate();

        try {
            $this->form->store();
            $this->dispatch('alert-confirm', title: 'Karya Seni Berhasil Ditambah, Anda Ingin Keluar dari Halman Ini?', icon: 'success', rute: route('index.karya-seni'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'error');
        }
    }



    public function deleteImg($key)
    {
        unset($this->form->imgPush[$key]);
        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
    }

    public function updatedFormFoto()
    {
        $validator = Validator::make($this->form->only('foto'), $this->form->rules(['foto']));

        if (!$validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'warning');
        }

        array_push($this->form->imgPush, $this->form->foto);
        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dipilih.', icon: 'success');
        $validator->validate();
    }
}
