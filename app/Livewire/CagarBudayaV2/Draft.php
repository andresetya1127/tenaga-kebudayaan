<?php

namespace App\Livewire\CagarBudayaV2;

use App\Models\Cagar_budaya_v2;
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
            $data = Cagar_budaya_v2::where('nama_cagar', 'like', '%' . $this->search . '%',)
                ->whereIn('status_draft', [1, 2, 3])
                ->latest()
                ->paginate(10);
        } else {
            $data = Cagar_budaya_v2::whereIn('status_draft', [1, 2, 3])->latest()->paginate(10);
        }

        return view('livewire.cagar-budaya-v2.draft', [
            'page' => 'Draf Cagar Budaya',
            'data' => $data
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
