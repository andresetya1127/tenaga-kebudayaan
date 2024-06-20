<?php

namespace App\Livewire\Landing;

use App\Models\tbl_galeri;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Galeri extends Component
{
    public $search;
    #[Layout('components.layouts.landing')]
    public function render()
    {

        $data = new tbl_galeri();

        $query = null;
        if ($this->search) {
            $query = $data->whereAny(['nama_foto', 'kategori'], 'like', '%' . $this->search . '%');
        }

        $galeri = $query ? $query->paginate(10) : $data->paginate(10);

        $filter = $data->select('kategori')->groupBy('kategori')->get();

        return view('livewire.landing.galeri', [
            'title' => 'Galeri',
            'galeri' => $galeri,
            'filterImg' => $filter
        ]);
    }
}
