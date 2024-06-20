<?php

namespace App\Livewire\CagarBudaya;

use App\Livewire\Forms\CagarBudaya;
use App\Models\Tbl_cagar_budaya;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;
    public CagarBudaya $form;

    public function render()
    {
        $data = new Tbl_cagar_budaya();

        return view('livewire.cagar-budaya.add', [
            'page' => 'Tambah Cagar Budaya.',
            'data' => $data
        ]);
    }


    public function addCagar()
    {
        $this->form->store();
    }
}
