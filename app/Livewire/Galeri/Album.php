<?php

namespace App\Livewire\Galeri;

use App\Models\tbl_galeri;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Album extends Component
{
    use WithPagination, WithFileUploads;


    public $galeri;

    public $modalEdit;
    #[Validate('required')]
    public $imgUpload = [];

    public $gambar;


    #[Locked]
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        $this->galeri = tbl_galeri::find($this->id);
    }

    public function render()
    {
        return view('livewire.galeri.album', [
            'page' => 'Galeri '
        ]);
    }

    public function updatedGambar()
    {
        if (count($this->imgUpload) >= 5) {
            $this->dispatch('sweat-alert', title: 'Gambar Sudah Melebihi Batas.', icon: 'warning');
        } else {
            Validator::make($this->all(), [
                'gambar' => 'required|image|max:2048|mimes:png,jpg,jpeg,gif',
            ])->validate();


            array_push($this->imgUpload, $this->gambar);
        }
    }


    public function addGaleri()
    {

        $nameField = $this->galeri->foto ? explode('||', $this->galeri->foto) : [];

        try {
            $this->validateOnly('imgUpload');

            foreach ($this->imgUpload as $img) {
                $filename = md5($img . microtime()) . '.' .  $img->getClientOriginalExtension();

                $img->storeAs('public/photos', $filename);

                array_push($nameField, $filename);
            }

            $this->galeri->update([
                'foto' => Arr::join($nameField, '||'),
            ]);

            $this->dispatch('sweat-alert', title: 'Data Berhasil Disimpan.', icon: 'success');
            $this->reset('modalEdit', 'imgUpload', 'gambar');
            $this->resetValidation();
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('sweat-alert', title: $th->getMessage(), icon: 'error');
        }
    }


    public function deleteImg($id)
    {
        try {
            unset($this->imgUpload[$id]);
            $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('sweat-alert', title: 'Data Gagal Dihapus.', icon: 'error');
        }
    }



    public function confirmDelete($index)
    {

        $imp = explode('||', $this->galeri->foto);

        if (Storage::exists('public/photos/' . $imp[$index])) {
            Storage::delete('public/photos/' . $imp[$index]);
        }

        unset($imp[$index]);

        $file = implode('||', $imp);



        $this->galeri->update([
            'foto' => $file,
        ]);
    }
}
