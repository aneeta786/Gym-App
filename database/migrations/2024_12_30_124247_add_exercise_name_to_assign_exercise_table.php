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
        Schema::table('assign_exercise', function (Blueprint $table) {
            $table->string('exercise_name')->after('exercise_id');  // Add 'exercise_name' after 'exercise_id'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assign_exercise', function (Blueprint $table) {
            $table->dropColumn('exercise_name');  // Drop the 'exercise_name' column if rolling back
        });
    }
};
