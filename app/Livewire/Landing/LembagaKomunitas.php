<?php

namespace App\Livewire\Landing;

use App\Models\Tbl_lembaga_komunitas;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class LembagaKomunitas extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $search;

    #[Layout('components.layouts.landing')]
    public function render()
    {
        $data = Tbl_lembaga_komunitas::query();

        if ($this->search) {
            $data->where('nama_lembaga', 'LIKE', '%' . $this->search . '%')
                ->orWhere('jenis_lembaga', 'LIKE', '%' . $this->search . '%')
                ->orWhere('nama_ketua', 'LIKE', '%' . $this->search . '%');
        }

        $lembaga = $data->paginate(10);

        return view('livewire.landing.lembaga-komunitas', [
            'title' => 'Lembaga Komunitas',
            'data' => $lembaga
        ]);
    }

    public function detailLembaga($id)
    {
        redirect()->route('detail.lembaga', $id);
    }
}
