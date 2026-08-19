<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'league_id', 'name', 'budget_remaining_cents'];

    protected $casts = [
        'budget_remaining_cents' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'team_players')
            ->withPivot('purchase_cost_cents')
            ->withTimestamps();
    }
}
