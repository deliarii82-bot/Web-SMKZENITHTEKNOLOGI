<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Jangan membuat tabel lagi jika sudah ada di database
        if (!Schema::hasTable('prestasi')) {
            Schema::create('prestasi', function (Blueprint $table) {
                $table->id();
                $table->string('nama_prestasi', 100);
                $table->string('nama_siswa', 100);
              $table->string('tingkat', 50);
                $table->string('peringkat', 50);
                $table->text('keterangan')->nullable();
                $table->string('foto')->nullable();
                $table->string('tahun_ajaran', 20);
            });
        }
    }

    public function down(): void
    {
        // Sengaja tidak menghapus tabel agar data manual tetap aman
    }
};

