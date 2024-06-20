<?php

namespace App\Livewire;

use App\Models\Cagar_budaya_v2;
use App\Models\Tbl_odcb;
use Livewire\Component;

class Maps extends Component
{
    public $cView = [-8.726563419451553, 116.29262303091596];
    public $marker = [];

    public function mount()
    {
        $odcb = Tbl_odcb::get(['nama_cagar', 'jenis_cb', 'latitude', 'longitude']);


        foreach ($odcb as $val) {
            $option = [];

            if ($val->jenis_cb == 'Situs') {
                $option = ['icon' => 'red', 'data' => $val];
            } elseif ($val->jenis_cb == 'Bangunan') {
                $option = ['icon' => 'green', 'data' => $val];
            }

            $this->marker[$val->nama_cagar] = $option;
        }
    }

    public function render()
    {
        $this->maps();
        return view('livewire.maps');
    }

    public function maps()
    {
        $this->dispatch(
            'dataMaps',
            [
                'centerView' => $this->cView,
                'marker' => $this->marker
            ]
        );
    }
}
