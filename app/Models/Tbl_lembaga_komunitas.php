<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tbl_lembaga_komunitas extends Model
{
    use HasFactory, Uuid;

    protected $primaryKey = 'id_lembaga';

    protected $guarded = [];

    protected $field = [
        "nama_lembaga",
        "jenis_lembaga",
        "nama_ketua",
        "no_ketua",
        "tgl_pendirian",
        "alamat_sekretariat",
        'jumlah_anggota'
    ];

    protected $enum = [
        'jenis_lembaga' => [
            'Lembaga Adat Masyarakat',
            'Tradisi Lisan',
            'Manuskrip',
            'Adat Istiadat/ Pranata Adat',
            'Olahraga Tradisional/ Permainan Rakyat',
            'Kuliner',
            'Pengobatan Tradisional',
            'Teknologi Tradisional',
            'Bahasa/ Sastra',
            'Seni Tari',
            'Seni Musik',
            'Seni Drama',
            'Seni Rupa',
            'Seni Wayang',
            'Penenun',
            'Kolektor',
            'Pelestari',
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
