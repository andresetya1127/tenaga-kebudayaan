<?php

namespace App\Livewire\Galeri;

use App\Models\tbl_galeri;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads, WithoutUrlPagination;

    public $modalAdd;
    public $filter;
    public $search;

    public $nama_foto;
    public $kategori;
    public $imgUpload = [];
    public $gambar;

    public function render()
    {
        $data = new tbl_galeri();

        $query = null;
        if ($this->search) {
            $query = $data->whereAny(['nama_foto', 'kategori'], 'like', '%' . $this->search . '%');
        }

        $galeri = $query ? $query->paginate(10) : $data->paginate(10);


        $filter = $data->select('kategori')->groupBy('kategori')->get();

        return view('livewire.galeri.index', [
            'page' => 'Galeri SIMDK',
            'galeri' => $galeri,
            'filterImg' => $filter
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
        $nameField = [];

        Validator::make($this->all(), [
            'nama_foto' => 'required|max:50',
            'kategori' => 'required|max:100',
            'gambar' => 'required|image|max:2048|mimes:png,jpg,jpeg,gif',
        ])->validate();

        try {
            foreach ($this->imgUpload as $img) {
                $filename = md5($img . microtime()) . '.' .  $img->getClientOriginalExtension();

                $img->storeAs('public/photos', $filename);

                array_push($nameField, $filename);
            }

            tbl_galeri::create([
                'nama_foto' => $this->nama_foto,
                'kategori' => $this->kategori,
                'foto' => implode('||', $nameField),
            ]);

            $this->dispatch('sweat-alert', title: 'Data Berhasil Disimpan.', icon: 'success');
            $this->reset();
            $this->resetValidation();
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('sweat-alert', title: 'Data Gagal Disimpan.', icon: 'error');
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
}
