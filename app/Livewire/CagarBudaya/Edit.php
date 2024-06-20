<?php

namespace App\Livewire\CagarBudaya;

use App\Livewire\Forms\CagarBudaya;
use App\Models\Tbl_cagar_budaya;
use Livewire\Component;

class Edit extends Component
{

    protected $tbl_cagar;

    public CagarBudaya $form;

    public function __construct()
    {
        $this->tbl_cagar = new Tbl_cagar_budaya();
    }

    public function mount($id)
    {
        $this->form->setData($id);
    }

    public function render()
    {
        return view('livewire.cagar-budaya.edit', [
            'page' => 'Edit Cagar Budaya.',
            'cagar' => $this->tbl_cagar,
        ]);
    }

    public function update()
    {
        $this->form->update();
    }
}
