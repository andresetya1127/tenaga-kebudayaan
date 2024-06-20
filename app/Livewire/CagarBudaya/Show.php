<?php

namespace App\Livewire\CagarBudaya;

use App\Models\Tbl_cagar_budaya;
use Livewire\Component;

class Show extends Component
{

    protected $cagar;

    public function __construct()
    {
        $this->cagar = new Tbl_cagar_budaya();
    }

    public function render()
    {
        return view('livewire.cagar-budaya.show', [
            'cagar_budaya' =>
            $this->cagar->with('detailCagar:id_cagar_budaya')->latest()->get()
        ]);
    }

    public function delete_cagar($id)
    {
        $this->cagar::find($id)->delete();
        redirect()->route('index.cagar_budaya')
            ->with('alert', ['type' => 'success', 'message' => 'Data Berhasil Dihapus']);
    }
}
