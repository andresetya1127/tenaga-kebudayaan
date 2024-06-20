<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cagar_budaya_v2s', function (Blueprint $table) {
            $table->uuid('id_cagar')->primary();
            $table->string('kode_cb', 150)->nullable();
            $table->text('jenis_cb')->nullable();
            // Data Benda
            $table->string('nama_cagar', 150)->nullable();
            $table->string('sifat_bangunan', 100)->nullable();
            $table->string('priode_bangunan', 100)->nullable();
            $table->string('gaya_arsitektur', 100)->nullable();
            $table->string('fungsi_bangunan', 100)->nullable();
            $table->string('bentuk_atap', 100)->nullable();
            // Lokasi Penemuan
            $table->foreignId('provinsi')->default(52);
            $table->string('kabupaten', 20)->nullable();
            $table->string('kecamatan', 20)->nullable();
            $table->string('desa_kel', 100)->nullable();
            $table->string('dusun', 200)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('ketinggian', 100)->nullable();
            //Data Fisik
            $table->string('bahan_bangunan', 100)->nullable();
            $table->string('satuan_waktu', 100)->nullable();
            $table->string('priode_waktu', 100)->nullable();
            $table->string('waktu_pembuatan', 100)->nullable();
            $table->string('ornamen_bangunan', 100)->nullable();
            $table->string('tanda_bangunan', 100)->nullable();
            $table->string('warna_bangunan', 100)->nullable();
            // Data Dimensi
            $table->string('panjang', 100)->nullable();
            $table->string('lebar', 100)->nullable();
            $table->string('tinggi', 100)->nullable();
            $table->string('luas_bangunan', 100)->nullable();
            $table->string('luas_tanah', 100)->nullable();
            // Kondisi Terkini
            $table->string('keutuhan', 100)->nullable();
            $table->string('pemeliharaan', 100)->nullable();
            $table->string('pemugaran', 100)->nullable();
            $table->string('adaptasi', 100)->nullable();
            //Data Kepemilikan
            $table->string('status_kepemilikan', 100)->nullable();
            $table->string('nama_pemilik', 100)->nullable();
            $table->string('status_perolehan', 100)->nullable();
            $table->string('provinsi_pemilik', 100)->nullable();
            $table->string('kabupaten_pemilik', 100)->nullable();
            $table->string('kecamatan_pemilik', 100)->nullable();
            $table->string('desa_kel_pemilik', 100)->nullable();
            $table->string('alamat_pemilik', 100)->nullable();
            $table->string('latitude_pemilik')->nullable();
            $table->string('longitude_pemilik')->nullable();
            // Batas_zona
            $table->string('zona_utara', 100)->nullable();
            $table->string('zona_selatan', 100)->nullable();
            $table->string('zona_barat', 100)->nullable();
            $table->string('zona_timur', 100)->nullable();
            // Informasi
            $table->string('tingkatan_data', 100)->nullable();
            $table->string('tahun_pendataan', 100)->nullable();
            $table->string('tahun_verifikasi', 100)->nullable();
            $table->string('tahun_penetapan', 100)->nullable();
            $table->string('entitas_kebudayaan', 100)->nullable();
            $table->string('kategori', 100)->nullable();
            // Lainnya
            $table->text('deskripsi')->nullable();
            $table->string('status_pengelolaan', 100)->nullable();
            // media
            $table->string('foto')->nullable();
            $table->text('video')->nullable();
            $table->text('dokumen')->nullable();

            $table->integer('status', false, 5)->default('0');
            $table->integer('status_draft', false, 5)->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cagar_budaya_v2s');
    }
};
