<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')
                ->constrained('siswa')
                ->cascadeOnDelete();

            $table->foreignId('jenis_prestasi_id')
                ->constrained('jenis_prestasi');

            $table->foreignId('admin_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('petugas_id')
                ->nullable()
                ->constrained('petugas')
                ->nullOnDelete();

            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable();

            $table->enum('status',['pending','diterima','ditolak'])
                ->default('pending');

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};

