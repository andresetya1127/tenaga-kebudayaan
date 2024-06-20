<?php

namespace App\Livewire\Landing;

use App\Models\Tbl_karya_seni;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DetailKaryaSeni extends Component
{

    #[Locked]
    public $detail;

    public function mount($id)
    {
        $this->detail = Tbl_karya_seni::findOrFail($id);
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing.detail-karya-seni');
    }
}
