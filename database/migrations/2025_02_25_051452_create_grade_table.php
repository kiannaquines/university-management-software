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
        Schema::create('grade', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->foreignId('year_parent_id')->references('id')->on('year');
//            $table->foreignId('course_parent_id')->references('course_uuid')->on('course');
            $table->foreignId('student_parent_id')->references('id')->on('student');
            $table->float('grade')->nullable(false);
            $table->foreignId('semester_parent_id')->references('id')->on('semester');
//            $table->foreignId('instructor_parent_id')->references('instructor_uuid')->on('instructor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade');
    }
};
