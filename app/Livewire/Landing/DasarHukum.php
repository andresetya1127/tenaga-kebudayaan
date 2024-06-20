<?php

namespace App\Livewire\Landing;

use App\Models\Tbl_dasar_hukum;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DasarHukum extends Component
{
    #[Layout('components.layouts.landing')]
    public function render()
    {
        $hukum = Tbl_dasar_hukum::all();
        return view('livewire.landing.dasar-hukum', [
            'data' => $hukum
        ]);
    }
}
