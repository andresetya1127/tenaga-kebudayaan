<?php

namespace App\Livewire\Landing;

use App\Models\Tbl_lembaga_komunitas;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DetailLembagaKomunitas extends Component
{

    #[Locked]
    public $detail;

    function mount($id)
    {
        $this->detail = Tbl_lembaga_komunitas::findOrFail($id);
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing.detail-lembaga-komunitas');
    }
}
