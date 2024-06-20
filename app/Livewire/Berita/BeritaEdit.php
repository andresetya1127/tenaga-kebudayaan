<?php

namespace App\Livewire\Berita;

use App\Models\Tbl_berita;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class BeritaEdit extends Component
{

    use WithFileUploads;

    #[Validate('required|min:3')]
    public $title;

    #[Validate('required|min:10')]
    public $content;

    #[Validate('required')]
    public $image;

    public $imgTemp;


    #[Locked]
    public $data;

    public function mount($id)
    {
        $this->data = Tbl_berita::findOrFail($id);
        $this->title = $this->data->title;
        $this->content = $this->data->content;
        $this->image = $this->data->image;
    }

    public function render()
    {
        return view('livewire.berita.berta-edit');
    }

    public function deleteImg()
    {
        $this->reset('image', 'imgTemp');
        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Dihapus.', icon: 'success');
    }

    public function updatingImgTemp()
    {
        $this->dispatch('sweat-alert', title: 'Gambar Berhasil Diupload.', icon: 'success');
    }

    public function updateNews()
    {

        if ($this->imgTemp) {
            $filename = uniqid() . '-' . preg_replace('/[^\p{L}\p{N}\s]/u', '', $this->title) . '.' . $this->imgTemp->getClientoriginalExtension();

            if (Storage::exists('public/photos/' . $this->data->image)) {
                Storage::delete('public/photos/' . $this->data->image);
                $this->imgTemp->storeAs('public/photos', $filename);
            }
        } else {
            $filename = $this->data->image;
        }

        $this->image = $filename;

        $this->validate();

        $this->data->update([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image
        ]);

        $this->dispatch('sweat-alert', title: 'Berita Berhasil Diperbarui.', icon: 'success');
    }
}
