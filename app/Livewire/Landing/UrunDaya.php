<?php

namespace App\Livewire\Landing;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UrunDaya extends Component
{
    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing.urun-daya');
    }
}
