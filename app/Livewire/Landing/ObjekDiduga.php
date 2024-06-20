<?php

namespace App\Livewire\Landing;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Tbl_odcb;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ObjekDiduga extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

    public $jenisCagar;

    public $kecamatanID;

    public $desaID;

    public $peringkat;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingJenisCagar()
    {
        $this->resetPage();
    }

    public function updatingKecamatanID()
    {
        $this->resetPage();
        $this->desaID = null;
    }

    public function updatingDesaID()
    {
        $this->resetPage();
    }


    #[Computed()]
    public function kecamatan()
    {
        return Kecamatan::where('regency_id', 5202)->get();
    }

    #[Computed()]
    public function desa()
    {
        return Desa::where('district_id', $this->kecamatanID)->get();
    }


    #[Layout('components.layouts.landing')]
    public function render()
    {
        $data = Tbl_odcb::query();

        if ($this->search) {
            $data->where('nama_cagar', 'LIKE', '%' . $this->search . '%')->orWhere('nama_pemilik', 'LIKE', '%' . $this->search . '%');
        }

        if ($this->kecamatanID) {
            $data->where('kecamatan', $this->kecamatanID);
        }

        if ($this->desaID) {
            $data->where('desa_kel', $this->desaID);
        }

        if ($this->jenisCagar) {
            $data->where('jenis_cb', $this->jenisCagar);
        }

        if ($this->peringkat) {
            $data->where('peringkat', $this->peringkat);
        }

        $cagar = $data->where('status_draft', 4)->latest()->paginate(10);

        return view('livewire.landing.objek-diduga', [
            'data' => $cagar,
            'title' => 'Objek Diduga Cagar Budaya'
        ]);
    }



    function detailObjek($id)
    {
        redirect()->route('detail.odcb', $id);
    }
}
