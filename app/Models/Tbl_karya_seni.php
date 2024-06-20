<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tbl_karya_seni extends Model
{
    use HasFactory;
    use Uuid;

    protected $primaryKey = 'id_karya_seni';
    protected $guarded = [];
    protected $field = [
        "cabang_seni",
        "judul",
        "asal_daerah",
        "tahun_tercipta",
        "nama_pencipta",
        "no_hp_pelestari",
        "alamat",
    ];

    protected $enum = [
        'cabang_seni' => [
            'Tari Tradisional',
            'Musik Tradisional',
            'Teater Tradisional',
            'Film',
            'Wayang Tradisional',
            'Pakaian Adat',
            'Aksesoris',
            'Motif Batik',
            'Motif Tenun',
            'Motif Gerabah',
            'Motif Ukiran',
            'Arsitektur Tradisional',
            'Tata Kelola',
            'Transportasi',
            'Senjata Tradisional',
            'kerajinan Bambu',
            'Kerajinan Logam',
            'Kerajinan Kaca',
            'Permainan Rakyat',
            'Olahraga Tradisional',
            'Kuliner Tradisional',
            'Pengobatan Tradisional',
            'Tradisi Masyarakat',
            'Pengetahuan Tradisional',
            'Teknologi Tradisional',
            'Upacara Adat',
            'Ritus',
            'Tradisi Lisan',
            'Keris',
            'Puisi',
            'Cerpen'
        ]
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
