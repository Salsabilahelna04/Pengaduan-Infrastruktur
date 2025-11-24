<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->unsignedBigInteger('id_warga')->nullable();
            $table->string('jenis_laporan');
            $table->string('judul');
            $table->date('tanggal');
            $table->string('lokasi')->nullable();
            $table->text('alamat');
            $table->text('keterangan');
            $table->string('foto')->nullable();
            $table->enum('status', ['diajukan', 'verifikasi', 'proses', 'selesai', 'ditolak'])->default('diajukan');
            $table->enum('prioritas', ['rendah', 'sedang', 'tinggi'])->default('sedang');
            $table->string('urgensi')->default('Tidak Terlalu Mendesak');
            $table->timestamps();

            $table->foreign('id_warga')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
