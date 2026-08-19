<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete();
            $table->foreignId('player_id')->constrained('players')->cascadeOnDelete();
            $table->unsignedInteger('purchase_cost_cents');
            $table->timestamps();

            $table->unique(['team_id', 'player_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_players');
    }
};
