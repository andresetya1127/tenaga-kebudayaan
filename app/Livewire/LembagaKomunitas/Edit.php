<?php

namespace App\Livewire\LembagaKomunitas;

use App\Livewire\Forms\LembagaBudaya;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Tbl_lembaga_komunitas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $toggle = true;
    public $id_lembaga;

    public LembagaBudaya $form;

    public function mount($id)
    {
        $this->form->setData($id);
        $this->id_lembaga = $id;
    }

    public function render()
    {
        $data =  Tbl_lembaga_komunitas::getModel()->getEnum('jenis_lembaga');

        return view('livewire.lembaga-komunitas.edit', [
            'page' => 'Edit Lembaga/Komunitas Budaya',
            'data' => $data,
            'kecamatan' => Kecamatan::where('regency_id', 5202)->get(),
            'desa' => Desa::where('district_id', $this->form->kecamatan)->get()
        ]);
    }

    public function update()
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
            ])
        );

        if ($validate->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan Isi Form Dengan Benar.', icon: 'warning');
        }

        $validate->validate();

        try {
            $this->form->update();
            $this->dispatch('alert-confirm', title: 'Lembaga/Komunitas Berhasil Disimpan, Anda Ingin Keluar dari Halaman Ini?', icon: 'success', rute: route('index.lembaga-komunitas'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->dispatch('sweat-alert', title: 'Lembaga/Komunitas Gagal Disimpan.', icon: 'error');
        }
    }





    public function updatedFormFoto()
    {
        $validator = Validator::make($this->form->only('foto'), $this->form->rules(['foto']));

        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal disimpan.', icon: 'warning');
        }


        $validator->validate();

        try {
            $filename = md5($this->form->foto . microtime()) . '.' . $this->form->foto->getClientOriginalExtension();

            array_push($this->form->imgPush, $filename);

            $model = Tbl_lembaga_komunitas::findOrFail($this->id_lembaga);
            if (Storage::exists('public/photos/' . $model->fotos)) {
                Storage::delete('public/photos/' . $model->fotos);
                $this->form->foto->storeAs('public/photos', $filename);
            }

            $model->update([
                'foto' => implode('||', $this->form->imgPush),
            ]);

            $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dipilih.', icon: 'success');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->dispatch('sweat-alert', title: 'Gambar gagal diunggah.', icon: 'error');
        }
    }



    public function deleteImg($key)
    {
        try {
            if (Storage::exists('public/photos/' . $this->form->imgPush[$key])) {
                Storage::delete('public/photos/' . $this->form->imgPush[$key]);
            }

            unset($this->form->imgPush[$key]);

            if (count($this->form->imgPush) > 0) {
                $imp = implode('||', $this->form->imgPush);
            } else {
                $imp = null;
            }

            Tbl_lembaga_komunitas::findOrFail($this->id_lembaga)->update([
                'foto' => $imp,
            ]);

            $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {

            dd($th->getMessage());
            $this->dispatch('sweat-alert', title: 'Gambar gagal dihapus.', icon: 'error');
        }
    }
}
