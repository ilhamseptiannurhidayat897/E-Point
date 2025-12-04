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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['petugas', 'guru', 'siswa'])->default('siswa')->after('email');
            $table->string('nis')->nullable()->after('role'); // untuk siswa
            $table->string('nip')->nullable()->after('nis'); // untuk guru
            $table->string('id_petugas')->nullable()->after('nip'); // untuk petugas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'nis', 'nip', 'id_petugas']);
        });
    }
};
