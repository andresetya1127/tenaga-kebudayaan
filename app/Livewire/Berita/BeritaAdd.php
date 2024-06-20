<?php

namespace App\Livewire\Berita;

use App\Models\Tbl_berita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class BeritaAdd extends Component
{
    use WithFileUploads;

    public $judul;

    public $berita;

    public $gambar;

    public function render()
    {
        return view('livewire.berita.berta-add');
    }


    public function updatingImage()
    {
        $validator = Validator::make(
            [
                'gambar' => $this->gambar
            ],
            [
                'gambar' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2042']
            ]
        );

        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Gambar gagal diunggah.', icon: 'error');
            $validator->validate();
        }

        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Diupload.', icon: 'success');
    }

    public function deleteImg()
    {
        $this->reset('gambar');
        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
    }

    public function addNews()
    {
        $validator = Validator::make(
            $this->all(),
            [
                'judul' => ['required', 'string', 'max:255'],
                'berita' => ['required', 'string'],
                'gambar' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2042']
            ]
        );

        if ($validator->fails()) {
            $this->dispatch('sweat-alert', title: 'Data gagal disimpan.', icon: 'error');
            $validator->validate();
        }


        try {
            $imagName = uniqid() . '-' . $this->title . '.' . $this->gambar->getClientOriginalExtension();

            $this->gambar->storeAs('public/photos', $imagName);

            Tbl_berita::create([
                'title' => $this->judul,
                'content' => $this->berita,
                'image' => $imagName,
                'name' => Auth::user()->name,
                'tgl_upload' => date('Y-m-d')
            ]);

            $this->dispatch('alert-confirm', title: 'Berita Berhasil Dipublis, Ingin Keluar Halaman ?', icon: 'success', rute: route('list.berita'));

            $this->reset();
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: $th->getMessage(), icon: 'error');
        }
    }
}
