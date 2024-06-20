<?php

namespace App\Livewire\LembagaKomunitas;

use App\Livewire\Forms\LembagaBudaya;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Tbl_lembaga_komunitas;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;
    public LembagaBudaya $form;

    public function render()
    {
        $data =  Tbl_lembaga_komunitas::getModel()->getEnum('jenis_lembaga');

        return view('livewire.lembaga-komunitas.add', [
            'page' => 'Tambah Lembaga/Komunitas Budaya',
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
                'nama_lembaga',
                'jenis_lembaga',
                'nama_ketua',
                'no_ketua',
                'kecamatan',
                'desa',
                'nik_ketua',
                'tgl_pendirian',
                'alamat_sekretariat',
                'email',
                'facebook',
                'instagram',
                'youtube',
                'jumlah_anggota',
                'susunan_pengurus',
                'uraian_aktivitas',
            ]),
        );

        if ($validate->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan Isi Form Dengan Benar.', icon: 'warning');
        }
        $validate->validate();

        try {
            $this->form->store();
            $this->dispatch('alert-confirm', title: 'Lembaga/Komunitas Berhasil Ditambah, Anda Ingin Keluar dari Halaman Ini?', icon: 'success', rute: route('index.lembaga-komunitas'));
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Lembaga/Komunitas Gagal Ditambah.', icon: 'error');
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
            array_push($this->form->imgPush, $this->form->foto);
            $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dipilih.', icon: 'success');
        }

        $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'warning');
        $validator->validate();
    }
}
