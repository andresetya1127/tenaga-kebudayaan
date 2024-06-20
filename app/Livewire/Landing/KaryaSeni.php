<?php

namespace App\Livewire\Landing;

use App\Models\Tbl_karya_seni;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class KaryaSeni extends Component
{


    use WithPagination, WithoutUrlPagination;

    public $search;

    #[Layout('components.layouts.landing')]
    public function render()
    {
        $data = Tbl_karya_seni::query();

        if ($this->search) {
            $data->where('judul', 'LIKE', '%' . $this->search . '%')->orWhere('nama_pencipta', 'LIKE', '%' . $this->search . '%');
        }
        $karya = $data->latest()->paginate(10);

        return view('livewire.landing.karya-seni', [
            'title' => 'Karya Seni',
            'data' => $karya
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function detailKaryaSeni($id)
    {
        redirect()->route('detail.karya-seni', $id);
    }
}
