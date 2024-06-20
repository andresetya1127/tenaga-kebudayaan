<?php

namespace App\Livewire\Odcb;

use App\Models\Tbl_odcb;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Draft extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

    public function render()
    {
        if (!empty($this->search)) {
            $data = Tbl_odcb::where('nama_cagar', 'like', '%' . $this->search . '%',)
                ->whereIn('status_draft', [1, 2, 3])
                ->latest()
                ->paginate(10);
        } else {
            $data = Tbl_odcb::whereIn('status_draft', [1, 2, 3])->latest()->paginate(10);
        }

        return view('livewire.odcb.draft', [
            'page' => 'Draf Cagar Budaya',
            'data' => $data
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
