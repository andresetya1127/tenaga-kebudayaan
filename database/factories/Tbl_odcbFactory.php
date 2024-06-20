<?php

namespace Database\Factories;

use App\Models\Tbl_odcb;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Tbl_odcbFactory extends Factory
{
    protected $model = Tbl_odcb::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_cb' => Str::random(16),
            'jenis_cb' => 'Benda',
            'nama_cagar' => fake()->address(),
            'sifat_bangunan' => fake()->text(10),
            'priode_bangunan' => fake()->year(),
            'gaya_arsitektur' => fake()->text(30),
            'fungsi_bangunan' => fake()->text(20),
            'bentuk_atap' => fake()->text(15),
            'kabupaten' => '5205',
            'kecamatan' => '5202011',
            'desa_kel' => '5202011002',
            'dusun' => fake()->text(20),
            'alamat' => fake()->address(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'ketinggian' => '100',
            'bahan_bangunan' => fake()->text(10),
            'satuan_waktu' => 'tahun',
            'priode_waktu' => 'masehi',
            'waktu_pembuatan' => fake()->year(),
            'ornamen_bangunan' => '-',
            'tanda_bangunan' => 'biru',
            'warna_bangunan' => 'biru',
            'panjang' => '100',
            'lebar' => '100',
            'tinggi' => '100',
            'luas_bangunan' => '100',
            'luas_tanah' => '100',
            'keutuhan' => 'utuh',
            'pemeliharaan' => 'Dipelihara',
            'pemugaran' => '-',
            'adaptasi' => fake()->text(10),
            'status_kepemilikan' => 'Milik Sendiri',
            'nama_pemilik' => fake()->name(),
            'status_perolehan' => 'Diproleh',
            'provinsi_pemilik' => '52',
            'kabupaten_pemilik' => '5205',
            'kecamatan_pemilik' => '5202011',
            'desa_kel_pemilik' => '5202011002',
            'alamat_pemilik' => fake()->address(),
            'latitude_pemilik' => fake()->latitude(),
            'longitude_pemilik' => fake()->longitude(),
            'zona_utara' => '-',
            'zona_selatan' => '-',
            'zona_barat' => '-',
            'zona_timur' => '-',
            'tingkatan_data' => '-',
            'tahun_pendataan' => fake()->year(),
            'tahun_verifikasi' => fake()->year(),
            'tahun_penetapan' => fake()->year(),
            'entitas_kebudayaan' => '-',
            'kategori' => 'Benda',
            'deskripsi' => Str::random(16),
            'status_pengelolaan' => '-',
            'foto' => 'default.png',
            'video' => '-',
            'dokumen' => '-',
            'status' => 0,
            'status_draft' => 4,
        ];
    }
}
