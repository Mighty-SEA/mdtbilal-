<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_level_id')->constrained('class_levels');
            $table->foreignId('academic_year_id')->constrained('academic_years');
            $table->foreignId('teacher_id')->nullable()->constrained('teachers'); // wali kelas
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
}; 