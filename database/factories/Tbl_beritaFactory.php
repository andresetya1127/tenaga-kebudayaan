<?php

namespace Database\Factories;

use App\Models\Tbl_berita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tbl_berita>
 */
class Tbl_beritaFactory extends Factory
{
    protected $model = Tbl_berita::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'content' => fake()->text(),
            'tag' => 'Berita,data',
            'name' => fake()->name(),
            'views' => 0,
            'image' => 'default.png',
            'tgl_upload' => fake()->date(),
        ];
    }
}
