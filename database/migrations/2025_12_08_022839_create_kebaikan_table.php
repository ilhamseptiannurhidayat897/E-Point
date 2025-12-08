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
        Schema::create('kebaikan', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); 
            $table->string('nama_kebaikan');
            $table->integer('poin'); 
            $table->timestamps();
        });
    }
};
