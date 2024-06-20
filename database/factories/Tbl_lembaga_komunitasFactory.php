<?php

namespace Database\Factories;

use App\Models\Tbl_lembaga_komunitas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tbl_lembaga_komunitas>
 */
class Tbl_lembaga_komunitasFactory extends Factory
{

    protected $model = Tbl_lembaga_komunitas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kabupaten' => 5202,
            'nama_lembaga' => fake()->userName(),
            'jenis_lembaga' => 'Tradisi Lisan',
            'nama_ketua' => fake()->name(),
            'no_ketua' => '087888888',
            'nik_ketua' => '123456789012',
            'tgl_pendirian' => fake()->date(),
            'akte_pendirian' => '1234567890',
            'npwp' => '71318738',
            'alamat_sekretariat' => fake()->address(),
            'email' => fake()->unique()->email(),
            'facebook' => fake()->unique()->userName(),
            'instagram' => '@' . fake()->unique()->userName(),
            'youtube' => fake()->unique()->userName(),
            'jumlah_anggota' => fake()->randomNumber(),
            'susunan_pengurus' => fake()->text(20),
            'uraian_aktivitas' => fake()->text(20),
        ];
    }
}
