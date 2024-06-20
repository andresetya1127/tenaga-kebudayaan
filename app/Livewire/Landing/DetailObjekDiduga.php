<?php

namespace App\Livewire\Landing;

use App\Models\Tbl_odcb;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DetailObjekDiduga extends Component
{
    #[Locked]
    public $detail;

    public function mount($id)
    {
        $this->detail = Tbl_odcb::findOrFail($id);
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing.detail-objek-diduga');
    }
}
