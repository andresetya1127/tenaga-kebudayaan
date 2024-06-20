<?php

namespace App\Livewire\Berita;

use App\Models\Tbl_berita;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class BeritaList extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $block = false;

    public $search;

    public function updatingBlock()
    {
        $this->resetPage();
        $this->reset('search');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $model = new Tbl_berita();

        if (!empty($this->search)) {
            $data = $model->where('title', 'like', '%' . $this->search . '%',)
                ->orWhere('tgl_upload', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10);
        } else {
            $data = $model->latest()->paginate(10);
        }

        return view('livewire.berita.berita-list', [
            'data' => $data
        ]);
    }


    public function deleteNews($id)
    {
        try {
            $model = Tbl_berita::findOrFail($id);

            if (Storage::exists('public/photos/' . $model->foto)) {
                Storage::delete('public/photos/' . $model->foto);
            }
            $model->delete();
            $this->dispatch('sweat-alert', title: 'Berita Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Berita Gagal Dihapus.', icon: 'error');
        }
    }
}
