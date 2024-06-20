<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cagar_budaya_v2;
use App\Models\Tbl_berita;
use App\Models\Tbl_identitas;
use App\Models\Tbl_karya_budaya;
use App\Models\Tbl_karya_seni;
use App\Models\Tbl_lembaga_komunitas;
use App\Models\Tbl_odcb;
use App\Models\User;
use App\Models\Wbtb;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create();
        // Tbl_lembaga_komunitas::factory(20)->create();
        // Tbl_odcb::factory(20)->create();
        // Cagar_budaya_v2::factory(20)->create();
        // Tbl_karya_budaya::factory(20)->create();
        // Tbl_karya_seni::factory(20)->create();
        // Wbtb::factory(20)->create();
        // Tbl_berita::factory(20)->create();
        User::insert([
            'nama' => 'SuperAdmin',
            'nik' => '123456789',
            'no_hp' => '0123456789',
            'jenis_kelamin' => 'L',
            'role' => 1,
            'email' => 'super@gmail.com',
            'password' =>  Hash::make('super'),
        ]);

        Tbl_identitas::insert([
            'logo' => 'default-logo.png',
            'nama_web' => 'SIM DK',
        ]);
    }
}
