<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            // Assuming teams belong to a league, though ERD just links to users. 
            // We'll add league_id based on common sense for a draft game, nullable if it's a global team.
            $table->foreignId('league_id')->nullable()->constrained('leagues')->cascadeOnDelete();
            $table->string('name', 100);
            $table->unsignedInteger('budget_remaining_cents')->default(10000);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
