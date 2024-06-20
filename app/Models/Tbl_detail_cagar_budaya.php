<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_detail_cagar_budaya extends Model
{
    use HasFactory;
    use Uuid;

    protected $primaryKey = 'id_detail_cagar';

    protected $enum = [
        'kategori_objek' => ['Benda', 'Bangunan', 'Struktur', 'Situs', 'Kawasan'],
        'keberadaan_objek' => ['Darat', 'Perairan'],
        'lokasi_penyimpanan' => ['Jalan', 'RT', 'Desa', 'Kelurahan', 'Kab', 'Kota', 'Provinsi'],
        'ukuran' => ['Panjang', 'Lebar', 'Tinggi', 'Tebal', 'Diameter', 'Dasar', 'Badan', 'Tepian'],
        'bahan_utama' => ['Batu', 'Batuan', 'Porcelin', 'Silica', 'Logam', 'Kayu', 'Fosil', 'Tanah', 'Tembikar', 'Kertas', 'Kain', 'Lainnya'],
        'batas_lain' => ['Utara', 'Timur', 'Selatan', 'Barat'],
        'kondisi' => ['Terawat', 'Tidak Terawat', 'Utuh', 'Tidak Utuh']
    ];

    public function getEnum($key = false)
    {
        if ($key) {
            return $this->enum[$key];
        } else {
            return $this->enum;
        }
    }
}
