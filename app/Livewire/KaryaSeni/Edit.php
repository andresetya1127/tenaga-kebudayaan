<?php

namespace App\Livewire\KaryaSeni;

use App\Livewire\Forms\KaryaSeni;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Tbl_karya_seni;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;


    public KaryaSeni $form;

    #[Locked]
    public $id_karya;

    public function mount($id)
    {
        $this->id_karya = $id;
        $this->form->setData($id);
    }

    public function render()
    {
        $data =  Tbl_karya_seni::getModel()->getEnum();

        return view('livewire.karya-seni.edit', [
            'page' => 'Edit Pendataan Karya Seni',
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
            ]),
        );

        if ($validate->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan Isi Form Dengan Benar.', icon: 'warning');
        }

        $validate->validate();

        try {
            $this->form->update();
            $this->dispatch('alert-confirm', title: 'Data Karya Seni Berhasil Diubah, Ingin Keluar Dari Halaman Ini?', icon: 'success', rute: route('index.karya-seni'));
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data Karya Seni Gagal Diubah.', icon: 'error');
        }
    }



    public function updatedFormFoto()
    {
        $validator = Validator::make($this->form->only('foto'), $this->form->rules(['foto']));

        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal disimpan.', icon: 'warning');
        }


        $validator->validate();

        $filename = md5($this->form->foto . microtime()) . '.' . $this->form->foto->getClientOriginalExtension();
        $this->form->foto->storeAs('public/photos', $filename);

        array_push($this->form->imgPush, $filename);

        Tbl_karya_seni::findOrFail($this->id_karya)->update([
            'foto' => implode('||', $this->form->imgPush),
        ]);


        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dipilih.', icon: 'success');
    }

    public function deleteImg($key)
    {

        try {
            if (count($this->form->imgPush) > 0) {
                $imp = implode('||', $this->form->imgPush);
            } else {
                $imp = null;
            }

            if (Storage::exists('public/photos/' . $this->form->imgPush[$key])) {
                Storage::delete('public/photos/' . $this->form->imgPush[$key]);
            }

            unset($this->form->imgPush[$key]);


            Tbl_karya_seni::findOrFail($this->id_karya)->update([
                'foto' => $imp,
            ]);

            $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal dihapus.', icon: 'error');
        }
    }
}
