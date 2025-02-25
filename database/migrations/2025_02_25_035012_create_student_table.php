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
        Schema::create('student', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->uuid('student_uuid');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('gender');
            $table->string('age');
            $table->string('address');
            $table->string('extension');
            $table->string('student_id');
//            $table->foreignId('department_id')->constrained()->onDelete('cascade');
//            $table->foreignId('year_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
