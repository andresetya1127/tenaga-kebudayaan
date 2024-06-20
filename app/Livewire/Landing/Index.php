<?php

namespace App\Livewire\Landing;

use App\Http\Controllers\Auth;
use App\Models\Tbl_berita;
use App\Models\Tbl_karya_seni;
use App\Models\Tbl_pengunjung;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Index extends Component
{
    #[Locked]
    public $berita;

    #[Locked]
    public $ip;


    public function mount()
    {
        $this->ip = request()->ip();

        $pengunjung = new Tbl_pengunjung();

        if ($pengunjung->where('ip_address', $this->ip)->exists()) {
            $pengunjung->where('ip_address', $this->ip)->update([
                'tgl_kunjung' => date('Y-m-d')
            ]);
        } else {
            $pengunjung->ip_address = $this->ip;
            $pengunjung->tgl_kunjung = date('Y-m-d');
            $pengunjung->save();
        }
        $this->berita = Tbl_berita::latest()->limit(3)->get();
    }

    #[Layout('components.layouts.landing')]
    public function render()
    {
        return view('livewire.landing.index');
    }
}
