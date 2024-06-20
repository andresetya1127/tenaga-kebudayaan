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
        Schema::create('tbl_identitas', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->text('nama_web');
            $table->text('no_kontak')->nullable();
            $table->text('website')->nullable();
            $table->text('email')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('youtube')->nullable();
            $table->text('twiter')->nullable();
            $table->text('lokasi_map')->nullable();
            $table->text('alamat')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('status_sosmed', false, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_identitas');
    }
};
