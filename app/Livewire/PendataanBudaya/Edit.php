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

class Edit extends Component
{

    use WithFileUploads;

    public PendataanBudaya $form;


    public function mount($id)
    {
        $this->form->id = $id;
        $this->form->setData();
    }

    public function render()
    {
        $json = Storage::get('public/json/bidang.json');
        $bidang = json_decode($json, true);
        $data = new Tbl_tenaga_kebudayaan();

        return view('livewire.pendataan-budaya.edit', [
            'page' => 'Edit Pendataan Kebudayaan',
            'data' => $data,
            'kecamatan' => Kecamatan::where('regency_id', 5202)->get(),
            'desa' => Desa::where('district_id', $this->form->kecamatan)->get(),
            'bidang' => $bidang
        ]);
    }

    public function update()
    {
        $validate = Validator::make(
            $this->form->all(),
            $this->form->rules([
                'nama',
                'email',
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


        if ($validate->fails()) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'warning');
            $validate->validate();
        }

        $this->form->update();

        $this->dispatch('alert-confirm', title: 'Data Berhasil Disimpan, Anda Ingin Keluar dari Halman Ini?', icon: 'success', rute: route('index.pendataan-kebudayaan'));
    }


    public function updatedFormFoto()
    {
        $validator = Validator::make(
            $this->form->all(),
            $this->form->rules(['foto']),
        );

        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal unggah.', icon: 'warning');
        };



        $this->form->fotoPush = $this->form->foto->temporaryUrl();

        $this->dispatch('sweat-alert', title: 'Gambar berhasil diunggah.', icon: 'success');
    }


    public function deleteImg()
    {
        $this->form->reset('fotoPush', 'foto');
        $this->dispatch('sweat-alert', title: 'Gambar berhasil dihapus.', icon: 'success');
    }
}
