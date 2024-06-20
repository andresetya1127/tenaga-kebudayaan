<?php

namespace App\Livewire\KaryaBudaya;

use App\Livewire\Forms\KaryaBudaya;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Tbl_karya_budaya;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component

{
    use WithFileUploads;
    public KaryaBudaya $form;

    public function render()
    {
        $data = new Tbl_karya_budaya();
        return view('livewire.karya-budaya.add', [
            'page' => 'Form Pendataan Karya Budaya',
            'data' => $data->getEnum(),
            'kecamatan' => Kecamatan::where('regency_id', 5202)->get(),
            'desa' => Desa::where('district_id', $this->form->kecamatan)->get()
        ]);
    }

    public function add()
    {

        $validate = Validator::make(
            $this->form->all(),
            $this->form->rules([
                'nama_karya',
                'jenis_karya',
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
                'foto'
            ]),
        );

        if ($validate->fails()) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'warning');
        }
        $validate->validate();

        try {
            $this->form->store();
            $this->dispatch('alert-confirm', title: 'Apakah anda ingin keluar dari halaman ini?', icon: 'success', rute: route('index.karya-budaya'));
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: "Data gagal disimpan", icon: 'error');
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

        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'warning');
        }
        $validator->validate();

        array_push($this->form->imgPush, $this->form->foto);
        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dipilih.', icon: 'success');
    }
}
