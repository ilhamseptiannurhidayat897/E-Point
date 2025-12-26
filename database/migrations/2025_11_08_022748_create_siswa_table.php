<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->string('nis')->unique();
            $table->string('nama');
            $table->enum('jk', ['L', 'P']);
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
        
    }
};
