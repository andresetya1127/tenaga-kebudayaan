<?php

namespace App\Livewire\Wbtb;

use App\Livewire\Forms\WbtbForm;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Wbtb;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public WbtbForm $form;

    #[Locked]
    public $data;
    public $filter;

    function mount($id)
    {
        $this->form->id = $id;
        $this->data = Wbtb::findOrFail($id);
        $this->form->setData();
    }

    public function render()
    {
        return view('livewire.wbtb.edit', [
            'page' => 'Edit Data WbTB' . $this->form->nama_warisan,
            'kecamatan' => Kecamatan::where('regency_id', 5202)->get(),
            'desa' => Desa::where('district_id', $this->form->kecamatan)->get()
        ]);
    }


    function update()
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
                'youtube',
            ])
        );

        if ($validate->fails()) {
            $this->dispatch('sweat-alert', title: 'Silahkan Isi Data WBTB Dengan Benar.', icon: 'warning');
        }
        $validate->validated();

        try {
            $this->form->editWbtb();
            $this->dispatch('alert-confirm', title: 'Data WBTB Berhasil Diubah.', rute: route('index.wbtb'), icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data WBTB Gagal Diubah.', icon: 'error');
        }
    }

    public function updatedFormFoto()
    {
        $Validator = Validator::make(
            $this->form->only('foto'),
            $this->form->rules(['foto'])
        );

        if ($Validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal diunggah.', icon: 'warning');
        }


        $Validator->validated();


        try {
            $filename = md5($this->form->foto . microtime()) . '.' . $this->form->foto->getClientOriginalExtension();
            $this->form->foto->storeAs('public/photos', $filename);

            array_push($this->form->imgPush, $filename);

            $this->data->update([
                'foto' => implode('||', $this->form->imgPush),
            ]);

            $this->dispatch('sweat-alert', title: 'Gambar berhasil diunggah.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: $th->getMessage(), icon: 'error');
        }
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


            $this->data->update([
                'foto' => $imp,
            ]);

            $this->dispatch('sweat-alert', title: 'Gambar berhasil dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal dihapus.', icon: 'error');
        }
    }
}
