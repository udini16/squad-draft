<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id', 'first_name', 'last_name', 'position', 'cost_cents', 'is_active'
    ];

    protected $casts = [
        'cost_cents' => 'integer',
        'is_active' => 'boolean',
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function stats(): HasMany
    {
        return $this->hasMany(PlayerGameweekStat::class);
    }
}
