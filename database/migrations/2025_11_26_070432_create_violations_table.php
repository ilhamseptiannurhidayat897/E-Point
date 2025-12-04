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
        Schema::create('violations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('violation_type_id')->constrained()->onDelete('cascade');

            $table->foreignId('reported_by')->nullable()->references('id')->on('users')->nullOnDelete();

            $table->date('violation_date');
            $table->text('notes')->nullable();
            $table->boolean('is_confirmed')->default(false);

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
