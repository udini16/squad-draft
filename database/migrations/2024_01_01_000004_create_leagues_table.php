<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->id(); // Using BIGINT as explicitly defined in ERD specification
            $table->string('name');
            $table->string('join_code')->unique()->nullable();
            $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('league_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('league_id')->constrained('leagues')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            
            $table->unique(['league_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('league_memberships');
        Schema::dropIfExists('leagues');
    }
};
