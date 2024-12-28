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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->integer('age'); 
            $table->string('email')->unique(); 
            $table->string('image')->nullable();
            $table->string('phone_no');
            $table->text('address'); 
            $table->enum('sex', ['male', 'female', 'other']); 
            $table->boolean('is_premium')->default(false); 
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
