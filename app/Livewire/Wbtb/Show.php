<?php

namespace App\Livewire\Wbtb;

use App\Models\Wbtb;
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
        $model = new Wbtb();

        if (!empty($this->search)) {
            $data = $model
                ->where('nama_warisan', 'like', '%' . $this->search . '%')
                ->orWhere('kategori_wbtb', 'like', '%' . $this->search . '%')
                ->orWhere('entitas_kebudayaan', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10);
        } else {
            $data = $model->latest()->paginate(10);
        }
        return view('livewire.wbtb.show', [
            'page' => 'Data Warisan Budaya Tak Benda',
            'data' => $data
        ]);
    }

    public function confirmDelete($id)
    {
        try {
            $data = Wbtb::find($id);

            if ($data->exists()) {
                Storage::delete('public/photos/' . $data->foto);
                Storage::delete('public/document/' . $data->dokumen);
                $data->delete();
            } else {
                $data->delete();
            }

            $this->dispatch('sweat-alert', title: 'Data WBTb Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data WBTb Gagal Dihapus.', icon: 'error');
        }
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }




    public function pembugaran($param, $id)
    {
        redirect()->route('pembugaran.show', [$param, $id]);
    }
}
