<?php

namespace App\Livewire\CagarBudayaV2;

use App\Models\Cagar_budaya_v2;
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
        $model = new Cagar_budaya_v2();

        if ($this->search) {
            $data = $model->where('nama_cagar', 'like', '%' . $this->search . '%',)
                ->orWhere('nama_pemilik', 'like', '%' . $this->search . '%')
                ->where('status_draft', 4)
                ->latest()
                ->paginate(10);
        } else {
            $data = $model->where('status_draft', 4)->latest()->paginate(10);
        }

        $total_draft = $model->whereIn('status_draft', [1, 2, 3])->count();

        return view('livewire.cagar-budaya-v2.show', [
            'page' => 'Data Cagar Budaya',
            'data' => $data,
            'draft' => $total_draft
        ]);
    }

    public function confirmDelete($id)
    {
        try {
            $data = Cagar_budaya_v2::find($id);

            if ($data->exists()) {
                Storage::delete('public/photos/' . $data->foto);
                Storage::delete('public/document/' . $data->dokumen);
                $data->delete();
            } else {
                $data->delete();
            }

            $this->dispatch('sweat-alert', title: 'Data Cagar Budaya Berhasil Dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data Cagar Budaya Gagal Dihapus.', icon: 'error');
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
