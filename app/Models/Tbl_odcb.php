<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tbl_odcb extends Model
{
    use HasFactory, Uuid;

    protected $table = 'tbl_odcbs';
    protected $primaryKey = 'id_odcb';
    protected $guarded = [];
    protected $field = [
        "jenis_cb",
        "nama_cagar",
        "sifat_bangunan",
        "priode_bangunan",
        "fungsi_bangunan",
        "bahan_bangunan",
        "waktu_pembuatan",
        "tanda_bangunan",
        "warna_bangunan",
        "tahun_verifikasi",
        "entitas_kebudayaan",
        "kategori",
    ];



    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function prov(): HasOne
    {
        return $this->hasOne(Provinsi::class, 'id', 'provinsi');
    }

    /**
     * Get the user associated with the cagar_budaya_v2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
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
