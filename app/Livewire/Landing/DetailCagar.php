<?php

namespace App\Livewire\Landing;

use App\Models\Cagar_budaya_v2;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DetailCagar extends Component
{
    #[Locked]
    public $detail;

    public function mount($id)
    {
        $this->detail = Cagar_budaya_v2::findOrFail($id);
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing.detail-cagar');
    }
}
