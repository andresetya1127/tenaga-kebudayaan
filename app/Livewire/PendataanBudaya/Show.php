<?php

namespace App\Livewire\PendataanBudaya;

use App\Models\Tbl_tenaga_kebudayaan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Show extends Component
{
    protected $budaya;
    public $filter;

    public function confirmDelete($id)
    {
        try {
            $data = Tbl_tenaga_kebudayaan::find($id);

            if (Storage::exists('public/photos/' . $data->foto)) {
                Storage::delete('public/photos/' . $data->foto);
            }
            $data->delete();

            $this->dispatch('sweat-alert', title: 'Data berhasil dihapus.', icon: 'success');
        } catch (\Throwable $th) {
            $this->dispatch('sweat-alert', title: 'Data gagal dihapus.', icon: 'error');
        }
    }
    public function render()
    {
        $budaya = new Tbl_tenaga_kebudayaan();

        return view('livewire.pendataan-budaya.show', [
            'data' => $budaya->where('status', 1)->latest()->get(),
            'page' => 'Pendataan Tenaga Kebudayaan'
        ]);
    }
}
