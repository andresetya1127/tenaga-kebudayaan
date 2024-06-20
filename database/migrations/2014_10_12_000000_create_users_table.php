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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('id_tenaga_kebudayaan')->nullable();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('no_hp');
            $table->string('jenis_kelamin');
            $table->string('foto')->default('default.jpg');
            $table->string('email')->unique();
            $table->string('sidebar')->nullable();
            $table->string('header')->nullable();
            $table->enum('role', [1, 2])->default(2);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_tenaga_kebudayaan')->references('id_tenaga_kebudayaan')->on('tbl_tenaga_kebudayaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
