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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->enum('tingkat',['X','XI','XII']);
            $table->enum('jurusan',['TO','TJKT','PPLG','DPIB','MPLB','AKL','SP']);
            $table->enum('konsentrasi',['GIM','RPL'])->nullable();
            $table->integer('nomor');
            $table->string('nama_kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
