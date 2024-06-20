<?php

namespace App\Livewire\Landing;

use App\Models\Wbtb as ModelsWbtb;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Wbtb extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $search;


    #[Layout('components.layouts.landing')]
    public function render()
    {
        $data = ModelsWbtb::query();

        if ($this->search) {
            $data->where('nama_warisan', 'like', '%' . $this->search . '%')
                ->orWhere('kategori_wbtb', 'like', '%' . $this->search . '%')
                ->orWhere('entitas_kebudayaan', 'like', '%' . $this->search . '%');
        }
        $wbtb = $data->latest()->paginate(10);

        return view('livewire.landing.wbtb', [
            'title' => 'Warisan Budaya Tak Benda',
            'data' => $wbtb
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function detailWbtb($id)
    {
        redirect()->route('detail.wbtb', $id);
    }
}
