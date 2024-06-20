<?php

namespace Database\Factories;

use App\Models\Tbl_karya_seni;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Tbl_karya_seniFactory extends Factory
{

    protected $model = Tbl_karya_seni::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cabang_seni' => Str::random(5),
            'judul' => fake()->title(),
            'asal_daerah' => fake()->country(),
            'tahun_tercipta' => fake()->year(),
            'nama_pencipta' => fake()->name(),
            'no_hp_pelestari' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'nik' => random_int(10, 16),
            'email' => fake()->unique()->email(),
            'facebook' => fake()->userName(),
            'instagram' => fake()->userName(),
            'deskripsi_karya' => fake()->text(),
            'jumlah_pendukung' => 900,
            'kostum_properti' => fake()->text(),
            'alat' => Str::random(10),
            'sinopsis' => fake()->text(),
            'pentas' => Str::random(10),
            'penghargaan' => Str::random(10),
            'dokumen' => Str::random(10),
            'foto' => 'default.png',
            'video' => Str::random(10),
            'id_user' => 1,
        ];
    }
}
