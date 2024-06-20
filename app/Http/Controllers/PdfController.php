<?php

namespace App\Http\Controllers;

use App\Models\Cagar_budaya_v2;
use App\Models\Kecamatan;
use App\Models\Tbl_karya_budaya;
use App\Models\Tbl_karya_seni;
use App\Models\Tbl_lembaga_komunitas;
use App\Models\Tbl_odcb;
use App\Models\Tbl_tenaga_kebudayaan;
use App\Models\Wbtb;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{

    protected $name;
    protected $wilayah;
    protected $sort;


    public function exportPdf(Request $request, $name)
    {
        $kecamatan = Kecamatan::select('id')->get()->toArray();
        $listKec = Arr::flatten($kecamatan);


        $this->name = $name;
        $this->wilayah = $request->wilayah;
        $this->sort = $request->sort;

        $group = false;

        $title = match ($name) {
            'cagar_budaya' => 'Cagar Budaya',
            'karya_budaya' => 'Karya Budaya',
            'karya_seni' => 'Karya Seni',
            'tenaga_kebudayaan' => 'Tenaga Kebudayaan',
            'lembaga_komunitas' => 'Lembaga Komunitas',
            'odcb' => 'Objek Diduga Cagar Budaya',
            'wbtb' => 'Warisan Budaya Takbenda',
        };


        $data = match ($name) {
            'cagar_budaya' => new Cagar_budaya_v2(),
            'karya_budaya' => new Tbl_karya_budaya(),
            'karya_seni' => new Tbl_karya_seni(),
            'tenaga_kebudayaan' => new Tbl_tenaga_kebudayaan(),
            'lembaga_komunitas' => new Tbl_lembaga_komunitas(),
            'odcb' => new Tbl_odcb(),
            'wbtb' => new Wbtb(),
        };


        if ($request->wilayah == 'all') {

            $kecamatan = match ($name) {
                'cagar_budaya' => 'kecamatan',
                'karya_budaya' => 'id_kec',
                'karya_seni' => 'id_kec',
                'tenaga_kebudayaan' => 'id_kec',
                'lembaga_komunitas' => 'id_kec',
                'odcb' => 'kecamatan',
                'wbtb' => 'kecamatan',
            };

            $footer = true;

            $query = $data->where(function ($q) {
                $cagar = $this->name == 'cagar_budaya';
                $odcb = $this->name == 'odcb';

                if ($cagar || $odcb) {
                    $q->where('status_draft', 4);
                }
            })->whereAny($data->getModel()->getField(), 'LIKE', "%$request->sort%")->get();

            $group = $data->with('kec')
                ->whereIn($kecamatan, $listKec)
                ->select($kecamatan,  DB::raw("COUNT($kecamatan) as jumlah"))
                ->groupBy($kecamatan)
                ->get();
        } else {
            $footer = false;

            $query = $data->where(
                function ($q) {

                    $cagar = $this->name == 'cagar_budaya';
                    $odcb = $this->name == 'odcb';
                    $wbtb = $this->name == 'wbtb';

                    if ($cagar || $odcb) {
                        $q->where('kecamatan', $this->wilayah)->where('status_draft', 4);
                    } else if ($wbtb) {
                        $q->where('kecamatan', $this->wilayah);
                    } else {
                        $q->where('id_kec', $this->wilayah);
                    }
                }
            )->whereAny($data->getModel()->getField(), 'LIKE', "%$request->sort%")->get();
        }

        $pdf = Pdf::loadView('livewire.laporan.pdf', compact('query', 'title', 'data', 'footer', 'group'));
        return $pdf->stream('Laporan ' . $name);
    }
}
