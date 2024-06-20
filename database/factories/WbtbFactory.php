<?php

namespace Database\Factories;

use App\Models\Wbtb;
use Faker\Core\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wbtb>
 */
class WbtbFactory extends Factory
{

    protected $model = Wbtb::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => uniqid(),
            'nama_warisan' => fake()->name(),
            'tingkatan_data' => 'Privinsi',
            'tgl_pendataan' => fake()->date(),
            'tgl_verifikasi' => fake()->date(),
            'tgl_penetapan' => fake()->date(),
            'provinsi' => 52,
            'Sebaran_kabupaten' => 5202,
            'entitas_kebudayaan' => 'Warisan Budaya Tak Benda',
            'domain_wbtb' => 'Ketrampilan dan Kemahiran Kerajinan Tradisional',
            'kategori_wbtb' => 'Seni Tradisi',
            'nama_objek' => fake()->name(),
            'Wilayah_level' => 'Provinsi',
            'kondisi_sekarang' => 'Masih Bertahan',
            'Kabupaten' => 5202,
            'tgl_penerimaan' => fake()->date(),
            'tempat_penerimaan' => fake()->address(),
            'nama_petugas' => fake()->name(),
            'nama_lembaga' => fake()->name(),
            'nama_sdm' => fake()->name(),
            'deskripsi' => fake()->text(),
            'foto' => 'default.png',
            'video' => '-',
            'dokumen' => '-',
            'status' => 0,
        ];
    }
}
