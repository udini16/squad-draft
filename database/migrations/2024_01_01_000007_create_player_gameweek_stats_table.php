<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('player_gameweek_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained('players')->cascadeOnDelete();
            $table->foreignId('gameweek_id')->constrained('gameweeks')->cascadeOnDelete();
            $table->unsignedSmallInteger('minutes_played')->default(0);
            $table->unsignedTinyInteger('goals')->default(0);
            $table->unsignedTinyInteger('assists')->default(0);
            $table->boolean('clean_sheet')->default(false);
            $table->smallInteger('total_points')->default(0);
            $table->timestamps();

            $table->unique(['player_id', 'gameweek_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('player_gameweek_stats');
    }
};
