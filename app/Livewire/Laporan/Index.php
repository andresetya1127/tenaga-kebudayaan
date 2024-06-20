<?php

namespace App\Livewire\Laporan;

use App\Models\Cagar_budaya_v2;
use App\Models\Kecamatan;
use App\Models\Tbl_karya_budaya;
use App\Models\Tbl_karya_seni;
use App\Models\Tbl_lembaga_komunitas;
use App\Models\Tbl_odcb;
use App\Models\Tbl_tenaga_kebudayaan;
use App\Models\Wbtb;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;


class Index extends Component
{

    public $filter;
    public $wilayah;
    public $sort;


    public $found;

    public function render()
    {
        return view('livewire.laporan.index', [
            'kecamatan' => Kecamatan::where('regency_id', 5202)->get(),
        ]);
    }


    public function updated()
    {

        $data = match ($this->filter) {
            'cagar_budaya' => new Cagar_budaya_v2(),
            'karya_budaya' => new Tbl_karya_budaya(),
            'karya_seni' => new Tbl_karya_seni(),
            'tenaga_kebudayaan' => new Tbl_tenaga_kebudayaan(),
            'lembaga_komunitas' => new Tbl_lembaga_komunitas(),
            'odcb' => new Tbl_odcb(),
            'wbtb' => new Wbtb(),
        };
        // dd(Schema::getColumnListing('wbtbs'));

        if ($this->wilayah == 'all') {
            $this->found = $data->where(function ($q) {
                $cagar = $this->filter == 'cagar_budaya';
                $odcb = $this->filter == 'odcb';

                if ($cagar || $odcb) {
                    $q->where('status_draft', 4);
                }
            })->whereAny($data->getModel()->getField(), 'LIKE', "%$this->sort%")->count();
        } else {
            $this->found = $data->where(function ($q) {

                $cagar = $this->filter == 'cagar_budaya';
                $odcb = $this->filter == 'odcb';
                $wbtb = $this->filter == 'wbtb';

                if ($cagar || $odcb) {
                    $q->where('kecamatan', $this->wilayah)->where('status_draft', 4);
                } else if ($wbtb) {
                    $q->where('kecamatan', $this->wilayah);
                } else {
                    $q->where('id_kec', $this->wilayah);
                }
            })->whereAny($data->getModel()->getField(), 'LIKE', "%$this->sort%")->count();
        }
    }
}
