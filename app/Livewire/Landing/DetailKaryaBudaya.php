<?php

namespace App\Livewire\Landing;

use App\Models\Tbl_karya_budaya;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DetailKaryaBudaya extends Component
{
    #[Locked]
    public $detail;

    public function mount($id)
    {
        $this->detail = Tbl_karya_budaya::findOrFail($id);
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing.detail-karya-budaya');
    }
}
