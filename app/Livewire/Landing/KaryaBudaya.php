<?php

namespace App\Livewire\Landing;

use App\Models\Tbl_karya_budaya;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class KaryaBudaya extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

    #[Layout('components.layouts.landing')]
    public function render()
    {
        $data = Tbl_karya_budaya::query();

        if ($this->search) {
            $data->where('nama_karya', 'LIKE', '%' . $this->search . '%')->orWhere('nama_pencipta', 'LIKE', '%' . $this->search . '%');
        }

        $karya = $data->paginate(10);
        return view('livewire.landing.karya-budaya', [
            'title' => 'Karya Budaya',
            'data' => $karya
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function detailKaryaBudaya($id)
    {
        redirect()->route('detail.karya-budaya', $id);
    }
}
