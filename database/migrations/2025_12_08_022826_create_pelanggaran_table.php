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
        Schema::create('pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete();
            $table->foreignId('jenis_pelanggaran_id')->constrained('jenis_pelanggaran');
            $table->foreignId('petugas_id')->constrained('petugas');
            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status',['pending','verifikasi'])->default('pending');
            $table->timestamps();
        });
    }
    public function down(): void
{
    Schema::dropIfExists('pelanggaran');
}

};
