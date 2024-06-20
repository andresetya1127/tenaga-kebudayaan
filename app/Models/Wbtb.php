<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Wbtb extends Model
{
    use HasFactory, Uuid;

    protected $primaryKey = 'id_wbtb';
    protected $guarded = [];
    protected $field = [
        "nama_warisan",
        "tingkatan_data",
        "sebaran_kabupaten",
        "entitas_kebudayaan",
        "domain_wbtb",
        "kategori_wbtb",
        "kondisi_sekarang",
        "tempat_penerimaan",
        "nama_petugas",
        "nama_lembaga",
    ];


    public function kab(): HasOne
    {
        return $this->hasOne(Kabupaten::class, 'id', 'kabupaten');
    }

    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kec(): HasOne
    {
        return $this->hasOne(Kecamatan::class, 'id', 'kecamatan');
    }

    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function desaKel(): HasOne
    {
        return $this->hasOne(Desa::class, 'id', 'desa_kel');
    }


    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provPemilik(): HasOne
    {
        return $this->hasOne(Provinsi::class, 'id', 'provinsi_pemilik');
    }

    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kabPemilik(): HasOne
    {
        return $this->hasOne(Kabupaten::class, 'id', 'kabupaten_pemilik');
    }

    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kecPemilik(): HasOne
    {
        return $this->hasOne(Kecamatan::class, 'id', 'kecamatan_pemilik');
    }

    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function desaPemilik(): HasOne
    {
        return $this->hasOne(Desa::class, 'id', 'desa_kel_pemilik');
    }


    public function getField()
    {
        return $this->field;
    }
}
