<?php

namespace Database\Factories;

use App\Models\Tbl_karya_budaya;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class tbl_karya_budayaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Tbl_karya_budaya::class;

    public function definition(): array
    {
        return [
            'nama_karya' => Str::random(5),
            'jenis_karya' => fake()->title(),
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
            'id_user' => 1,
        ];
    }
}
