<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_cagar_budaya extends Model
{
    use HasFactory;
    use Uuid;

    protected $primaryKey = 'id_cagar_budaya';

    protected $enum = [
        'pendidikan' => ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'],
        'agama' => ['Islam', 'Katolik', 'Protestein', 'Hindu', 'Budha', 'Konghuchu'],
        'pekerjaan' => ['PNS', 'TNI', 'Swasta', 'Wiraswasta', 'Pensiunan', 'Seniman', 'Lainnya']
    ];

    public function getEnum($key = false)
    {
        if ($key) {
            return $this->enum[$key];
        } else {
            return $this->enum;
        }
    }

    /**
     * Get the user associated with the tbl_cagar_budaya
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detailCagar()
    {
        return $this->hasOne(Tbl_detail_cagar_budaya::class, 'id_cagar_budaya', 'id_cagar_budaya');
    }
}
