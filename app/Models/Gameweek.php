<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gameweek extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'deadline_at', 'is_processed'];

    protected $casts = [
        'deadline_at' => 'datetime',
        'is_processed' => 'boolean',
    ];

    public function stats(): HasMany
    {
        return $this->hasMany(PlayerGameweekStat::class);
    }
}
