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
        Schema::create('tbl_tenaga_kebudayaans', function (Blueprint $table) {
            $table->uuid('id_tenaga_kebudayaan')->primary();
            $table->string('nama', 150);
            $table->text('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('pendidikan', 50);
            $table->string('agama', 50);
            $table->string('pekerjaan', 50);
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->string('nik', 16)->unique();
            $table->string('email', 150);
            $table->string('facebook', 150);
            $table->string('instagram', 150);
            $table->string('youtube', 150);
            $table->string('foto')->nullable();
            $table->text('bidang');
            $table->text('judul_karya_tahun');
            $table->text('penghargaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tenaga_kebudayaans');
    }
};
