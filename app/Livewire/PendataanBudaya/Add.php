<?php

namespace App\Livewire\PendataanBudaya;

use App\Livewire\Forms\PendataanBudaya;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Tbl_tenaga_kebudayaan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public PendataanBudaya $form;

    public function render()
    {
        $json = Storage::get('public/json/bidang.json');
        $bidang = json_decode($json, true);

        $data = new Tbl_tenaga_kebudayaan();

        return view('livewire.pendataan-budaya.add', [
            'page' => 'Pendataan Tenaga Kebudayaan.',
            'data' => $data,
            'kecamatan' => Kecamatan::where('regency_id', 5202)->get(),
            'desa' => Desa::where('district_id', $this->form->kecamatan)->get(),
            'bidang' => $bidang
        ]);
    }

    public function addPendataan()
    {
        $validator = Validator::make(
            $this->form->all(),
            $this->form->rules([
                'nama',
                'tmpt_lahir',
                'tgl_lahir',
                'jk',
                'agama',
                'kecamatan',
                'desa',
                'alamat',
                'nik',
                'no_hp',
                'bidang',
            ])
        );


        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan Isi Form Dengan Benar.', icon: 'warning');
        }
        $this->dispatch('$refresh');

        $validator->validated();

        try {
            $this->form->store();

            $this->dispatch('alert-confirm', title: 'Data Berhasil Disimpan, Anda Ingin Keluar dari Halman Ini?', icon: 'success', rute: route('index.pendataan-kebudayaan'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->dispatch('sweat-alert', title: 'Data Gagal Disimpan.', icon: 'error');
        }
    }

    public function updatedFormFoto()
    {
        $validator = Validator::make(
            $this->form->all(),
            $this->form->rules(['foto']),
        );

        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal disimpan.', icon: 'warning');
            $validator->validate();
        }


        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Diupload.', icon: 'success');
    }

    public function deleteImg()
    {
        $this->form->reset('foto');
        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
    }
}
