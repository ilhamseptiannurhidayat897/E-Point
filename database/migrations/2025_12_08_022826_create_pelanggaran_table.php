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
            $table->foreignId('siswa_id')->constrained('siswa');
            $table->foreignId('jenis_pelanggaran_id')->constrained('jenis_pelanggaran');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->integer('poin');
            $table->foreignId('petugas_id')->constrained('users');
            $table->timestamps();
        });
    }
};
