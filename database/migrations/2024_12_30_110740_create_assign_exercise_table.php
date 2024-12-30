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
        Schema::create('assign_exercise', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_id');  // Ensure it's unsignedBigInteger
            $table->unsignedBigInteger('member_id');    // Ensure it's unsignedBigInteger
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_exercise');
    }
};
