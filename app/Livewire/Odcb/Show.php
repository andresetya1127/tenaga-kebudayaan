<?php

namespace App\Livewire\Odcb;

use App\Models\Tbl_odcb;
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
        if ($this->search) {
            $data = Tbl_odcb::with('prov', 'kab', 'kec', 'desaKel')->where('nama_cagar', 'like', '%' . $this->search . '%',)
                ->where('status_draft', 4)
                ->latest()
                ->paginate(10);
        } else {
            $data = Tbl_odcb::with('prov', 'kab', 'kec', 'desaKel')->where('status_draft', 4)->latest()->paginate(10);
        }

        $total_draft = Tbl_odcb::whereIn('status_draft', [1, 2, 3])->count();

        return view('livewire.odcb.show', [
            'page' => 'Data Objek Diduga Cagar Budaya',
            'data' => $data,
            'draft' => $total_draft
        ]);
    }

    public function confirmDelete($id)
    {
        try {
            $data = Tbl_odcb::findOrFail($id);

            if ($data->exists()) {
                Storage::delete('public/photos/' . $data->foto);
                Storage::delete('public/document/' . $data->dokumen);
            }

            $data->delete();

            $this->dispatch('sweat-alert', title: 'Data Objek Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data Objek Gagal Dihapus.', icon: 'error');
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
