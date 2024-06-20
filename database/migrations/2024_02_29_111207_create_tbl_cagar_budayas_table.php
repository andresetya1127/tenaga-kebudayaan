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
        Schema::create('tbl_cagar_budayas', function (Blueprint $table) {
            $table->uuid('id_cagar_budaya')->primary();
            $table->string('nama_cagar', 100);
            $table->string('tmpt_lahir', 100);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('pendidikan', 50);
            $table->string('agama', 50);
            $table->string('pekerjaan', 50);
            $table->string('no_hp', 20);
            $table->string('email', 150);
            $table->string('facebook', 150);
            $table->string('instagram', 150);
            $table->string('youtube', 150);
            $table->text('bidang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_cagar_budayas');
    }
};
