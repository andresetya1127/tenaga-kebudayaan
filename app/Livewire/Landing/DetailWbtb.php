<?php

namespace App\Livewire\Landing;

use App\Models\Wbtb;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DetailWbtb extends Component
{
    public $detail;

    public function mount($id)
    {
        $this->detail = Wbtb::findOrFail($id);
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing.detail-wbtb');
    }
}
