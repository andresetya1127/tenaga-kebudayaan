-
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
        Schema::create('tbl_karya_senis', function (Blueprint $table) {
            $table->uuid('id_karya_seni')->primary();
            $table->string('cabang_seni', 150)->nullable();
            $table->string('judul', 200)->nullable();
            $table->text('asal_daerah')->nullable();
            $table->year('tahun_tercipta')->nullable();
            $table->string('nama_pencipta', 150)->nullable();
            $table->string('no_hp_pelestari', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->char('nik', 16)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('facebook', 150)->nullable();
            $table->string('instagram', 150)->nullable();
            $table->text('deskripsi_karya')->nullable();
            $table->integer('jumlah_pendukung', false)->nullable();
            $table->string('kostum_properti', 200)->nullable();
            $table->text('alat')->nullable();
            $table->text('sinopsis')->nullable();
            $table->string('pentas', 200)->nullable();
            $table->text('penghargaan')->nullable();
            $table->text('dokumen')->nullable();
            $table->string('foto')->nullable();
            $table->text('video')->nullable();
            $table->foreignId('id_user');
            $table->text('pesan_tolak')->nullable();
            $table->integer('status', false, 3)->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_karya_senis');
    }
};
