<?php

namespace App\Livewire\LembagaKomunitas;

use App\Models\Tbl_lembaga_komunitas;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search;
    public $filter;

    public function render()
    {
        $model = new Tbl_lembaga_komunitas();

        if ($this->search) {
            $data = $model->whereAny(['nama_lembaga', 'jenis_lembaga', 'nama_ketua'], 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $data = $model->latest()->paginate(10);
        }
        return view('livewire.lembaga-komunitas.show', [
            'page' => 'Data Lembaga Komunitas',
            'data' => $data
        ]);
    }

    public function confirmDelete($id)
    {
        try {
            $data = Tbl_lembaga_komunitas::find($id);

            if ($data->exists()) {
                Storage::delete('public/photos/' . $data->foto);
                Storage::delete('public/document/' . $data->dokumen);
                $data->delete();
            } else {
                $data->delete();
            }

            $this->dispatch('sweat-alert', title: 'Data Lembaga Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data Lembaga Gagal Dihapus.', icon: 'error');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
