<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tbl_tenaga_kebudayaan extends Model
{
    use HasFactory;
    use Uuid;

    protected $primaryKey = 'id_tenaga_kebudayaan';
    protected $guarded = [];

    protected $field = [
        "nama",
        "tmpt_lahir",
        "tgl_lahir",
        "jenis_kelamin",
        "pendidikan",
        "agama",
        "pekerjaan",
        "no_hp",
        "dusun",
        "alamat",
    ];

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


    public function getField()
    {
        return $this->field;
    }

    /**
     * Get the user associated with the Tbl_tenaga_kebudayaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'nik', 'nik');
    }



    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kec(): HasOne
    {
        return $this->hasOne(Kecamatan::class, 'id', 'id_kec');
    }

    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function desaKel(): HasOne
    {
        return $this->hasOne(Desa::class, 'id', 'id_desa');
    }
}
